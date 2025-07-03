import 'dotenv/config';
import express from 'express';
import cors from 'cors';
import { Web3 } from 'web3';
import COFFEE_SUPPLY_CHAIN_ABI from './abi.js';
import helmet from 'helmet';
import morgan from 'morgan';

const app = express();

// Middleware
app.use(helmet());
app.use(morgan('dev'));
app.use(cors({
  origin: process.env.ALLOWED_ORIGINS?.split(',') || '*',
  methods: ['GET', 'POST', 'OPTIONS'],
  allowedHeaders: ['Content-Type', 'Authorization']
}));
app.use(express.json({ limit: '10kb' }));

// Web3 setup
const { RPC_URL, CONTRACT_ADDRESS } = process.env;
const web3 = new Web3(new Web3.providers.HttpProvider(RPC_URL, {
  timeout: 30000,
  keepAlive: true
}));
const contract = new web3.eth.Contract(COFFEE_SUPPLY_CHAIN_ABI, CONTRACT_ADDRESS);

// Default sender variable
let defaultSender;

// Helper to get sender address (can customize later)
function getSenderAddress(providedAddress) {
  return providedAddress || defaultSender;
}

// ======================
// API Endpoints
// ======================

app.post('/admins', async (req, res) => {
  try {
    const { adminAddress, metamaskAddress } = req.body;
    const receipt = await contract.methods.addAdmin(adminAddress)
      .send({ from: getSenderAddress(metamaskAddress) });
    res.json({ txHash: receipt.transactionHash });
  } catch (error) {
    handleError(res, error, 'Failed to add admin');
  }
});

app.delete('/admins/:address', async (req, res) => {
  try {
    const receipt = await contract.methods.removeAdmin(req.params.address)
      .send({ from: getSenderAddress(req.body.metamaskAddress) });
    res.json({ txHash: receipt.transactionHash });
  } catch (error) {
    handleError(res, error, 'Failed to remove admin');
  }
});

app.post('/farms', async (req, res) => {
  try {
    const { farmerName, location, region, altitude, farmSize, coordinates, metamaskAddress } = req.body;
    const receipt = await contract.methods.registerFarm(
      farmerName, location, region, altitude, farmSize, coordinates
    ).send({ from: getSenderAddress(metamaskAddress) });
    res.json({
      txHash: receipt.transactionHash,
      farmId: receipt.events?.FarmRegistered?.returnValues?.farmId
    });
  } catch (error) {
    handleError(res, error, 'Farm registration failed');
  }
});

app.get('/farms/:id', async (req, res) => {
  try {
    const farm = await contract.methods.getFarmDetails(req.params.id).call();
    res.json(farm);
  } catch (error) {
    handleError(res, error, 'Failed to fetch farm');
  }
});

app.post('/batches', async (req, res) => {
  try {
    const { coffeeType, quantity, processingMethod, qualityGrade, moistureContent, certifications, metamaskAddress } = req.body;
    const receipt = await contract.methods.createCoffeeBatch(
      coffeeType, quantity, processingMethod, qualityGrade, moistureContent, certifications
    ).send({ from: getSenderAddress(metamaskAddress) });
    res.json({
      txHash: receipt.transactionHash,
      batchId: receipt.events?.BatchCreated?.returnValues?.batchId
    });
  } catch (error) {
    handleError(res, error, 'Batch creation failed');
  }
});

app.get('/batches/:id', async (req, res) => {
  try {
    const batch = await contract.methods.getBatchDetails(req.params.id).call();
    res.json(batch);
  } catch (error) {
    handleError(res, error, 'Failed to fetch batch');
  }
});

app.post('/processings', async (req, res) => {
  try {
    const { batchId, inputQuantity, outputQuantity, processingNotes, qualityTests, metamaskAddress } = req.body;
    const receipt = await contract.methods.addProcessingRecord(
      batchId, inputQuantity, outputQuantity, processingNotes, qualityTests
    ).send({ from: getSenderAddress(metamaskAddress) });
    res.json({ txHash: receipt.transactionHash });
  } catch (error) {
    handleError(res, error, 'Processing record failed');
  }
});

app.post('/quality-tests', async (req, res) => {
  try {
    const { batchId, testType, results, score, testerName, passed, metamaskAddress } = req.body;
    const receipt = await contract.methods.addQualityTest(
      batchId, testType, results, score, testerName, passed
    ).send({ from: getSenderAddress(metamaskAddress) });
    res.json({ txHash: receipt.transactionHash });
  } catch (error) {
    handleError(res, error, 'Quality test failed');
  }
});

app.post('/shipments', async (req, res) => {
  try {
    const { batchId, destination, expectedDeliveryDate, transportMethod, trackingNumber, metamaskAddress } = req.body;

    // Convert expectedDeliveryDate string to uint256 timestamp
    const deliveryTimestamp = Math.floor(new Date(expectedDeliveryDate).getTime() / 1000);

    const receipt = await contract.methods.addDistributionRecord(
      batchId, destination, deliveryTimestamp, transportMethod, trackingNumber
    ).send({ from: getSenderAddress(metamaskAddress) });
    res.json({ txHash: receipt.transactionHash });
  } catch (error) {
    handleError(res, error, 'Shipment failed');
  }
});

app.get('/traceability/:batchId', async (req, res) => {
  try {
    const traceData = await contract.methods.getFullTraceability(req.params.batchId).call();
    res.json(traceData);
  } catch (error) {
    handleError(res, error, 'Traceability check failed');
  }
});

// ======================
// Helper function
// ======================
function handleError(res, error, defaultMessage) {
  console.error(error);
  res.status(500).json({
    error: defaultMessage,
    details: process.env.NODE_ENV === 'development' ? error.message : null
  });
}

// Health check
app.get('/health', async (req, res) => {
  try {
    const [block, chainId] = await Promise.all([
      web3.eth.getBlockNumber(),
      web3.eth.getChainId()
    ]);
    res.json({
      status: 'healthy',
      network: {
        chainId,
        latestBlock: block
      }
    });
  } catch (error) {
    res.status(503).json({ status: 'unhealthy', error: error.message });
  }
});

// ======================
// Start server after loading accounts
// ======================
(async () => {
  try {
    const accounts = await web3.eth.getAccounts();
    console.log("Unlocked Ganache accounts:", accounts);
    defaultSender = accounts[0];
    console.log("Using default sender:", defaultSender);

    const PORT = process.env.PORT || 3000;
    app.listen(PORT, () => {
      console.log(`✅ Server running on port ${PORT}`);
      console.log(`📦 Contract: ${CONTRACT_ADDRESS}`);
      console.log(`🌐 RPC: ${RPC_URL}`);
    });
  } catch (err) {
    console.error("❌ Failed to start server:", err);
  }
})();
