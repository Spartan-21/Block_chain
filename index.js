// index.js
import 'dotenv/config';
import express from 'express';
import cors from 'cors';  // Import CORS package
import { Web3 } from 'web3';
import COFFEE_SUPPLY_CHAIN_ABI from './abi.js';

const app = express();

// Enable CORS with default settings (allows all origins)
app.use(cors());

// Parse JSON bodies
app.use(express.json());

// Load environment variables
const { RPC_URL, CONTRACT_ADDRESS } = process.env;

// Web3 and Contract Setup
const web3 = new Web3(RPC_URL || 'http://127.0.0.1:8545');
const contract = new web3.eth.Contract(COFFEE_SUPPLY_CHAIN_ABI, CONTRACT_ADDRESS);

// ======================
// Farm Operations
// ======================

app.post('/register-farm', async (req, res) => {
  try {
    const { farmerName, location, region, altitude, farmSize, coordinates, metamaskAddress } = req.body;
    
    const receipt = await contract.methods.registerFarm(
      farmerName, location, region, altitude, farmSize, coordinates
    ).send({ from: metamaskAddress, gas: 3000000 });

    res.json({ 
      status: 'Success', 
      txHash: receipt.transactionHash,
      farmId: receipt.events?.FarmRegistered?.returnValues?.farmId 
    });
  } catch (error) {
    console.error("Farm registration error:", error);
    res.status(500).json({ error: error.message });
  }
});

// ... [keep all your existing endpoints exactly as they are] ...

// ======================
// Server Startup
// ======================

const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
  console.log(`🚀 Bridge server running on http://localhost:${PORT}`);
  console.log(`CORS enabled for all origins`);
});