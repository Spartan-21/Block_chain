// abi.js
export default [
  {
    "inputs": [],
    "stateMutability": "nonpayable",
    "type": "constructor"
  }
];

const abicoffee = [
    {
      "inputs": [],
      "stateMutability": "nonpayable",
      "type": "constructor"
    },
    {
      "anonymous": false,
      "inputs": [
        {
          "indexed": true,
          "internalType": "address",
          "name": "admin",
          "type": "address"
        }
      ],
      "name": "AdminAdded",
      "type": "event"
    },
    {
      "anonymous": false,
      "inputs": [
        {
          "indexed": true,
          "internalType": "address",
          "name": "admin",
          "type": "address"
        }
      ],
      "name": "AdminRemoved",
      "type": "event"
    },
    {
      "anonymous": false,
      "inputs": [
        {
          "indexed": true,
          "internalType": "address",
          "name": "auditor",
          "type": "address"
        }
      ],
      "name": "AuditorAdded",
      "type": "event"
    },
    {
      "anonymous": false,
      "inputs": [
        {
          "indexed": true,
          "internalType": "address",
          "name": "auditor",
          "type": "address"
        }
      ],
      "name": "AuditorRemoved",
      "type": "event"
    },
    {
      "anonymous": false,
      "inputs": [
        {
          "indexed": true,
          "internalType": "uint256",
          "name": "batchId",
          "type": "uint256"
        },
        {
          "indexed": true,
          "internalType": "uint256",
          "name": "farmId",
          "type": "uint256"
        },
        {
          "indexed": false,
          "internalType": "uint256",
          "name": "quantity",
          "type": "uint256"
        }
      ],
      "name": "BatchCreated",
      "type": "event"
    },
    {
      "anonymous": false,
      "inputs": [
        {
          "indexed": true,
          "internalType": "uint256",
          "name": "batchId",
          "type": "uint256"
        },
        {
          "indexed": false,
          "internalType": "uint256",
          "name": "distributorId",
          "type": "uint256"
        },
        {
          "indexed": false,
          "internalType": "string",
          "name": "destination",
          "type": "string"
        }
      ],
      "name": "BatchShipped",
      "type": "event"
    },
    {
      "anonymous": false,
      "inputs": [
        {
          "indexed": true,
          "internalType": "uint256",
          "name": "farmId",
          "type": "uint256"
        },
        {
          "indexed": false,
          "internalType": "string",
          "name": "farmerName",
          "type": "string"
        },
        {
          "indexed": false,
          "internalType": "string",
          "name": "location",
          "type": "string"
        }
      ],
      "name": "FarmRegistered",
      "type": "event"
    },
    {
      "anonymous": false,
      "inputs": [
        {
          "indexed": true,
          "internalType": "address",
          "name": "previousOwner",
          "type": "address"
        },
        {
          "indexed": true,
          "internalType": "address",
          "name": "newOwner",
          "type": "address"
        }
      ],
      "name": "OwnershipTransferred",
      "type": "event"
    },
    {
      "anonymous": false,
      "inputs": [
        {
          "indexed": true,
          "internalType": "uint256",
          "name": "batchId",
          "type": "uint256"
        },
        {
          "indexed": false,
          "internalType": "uint256",
          "name": "processedBy",
          "type": "uint256"
        },
        {
          "indexed": false,
          "internalType": "uint256",
          "name": "outputQuantity",
          "type": "uint256"
        }
      ],
      "name": "ProcessingCompleted",
      "type": "event"
    },
    {
      "anonymous": false,
      "inputs": [
        {
          "indexed": true,
          "internalType": "uint256",
          "name": "batchId",
          "type": "uint256"
        },
        {
          "indexed": false,
          "internalType": "string",
          "name": "testType",
          "type": "string"
        },
        {
          "indexed": false,
          "internalType": "bool",
          "name": "passed",
          "type": "bool"
        }
      ],
      "name": "QualityTestAdded",
      "type": "event"
    },
    {
      "anonymous": false,
      "inputs": [
        {
          "indexed": true,
          "internalType": "uint256",
          "name": "batchId",
          "type": "uint256"
        },
        {
          "indexed": false,
          "internalType": "enum CoffeeSupplyChain.Stage",
          "name": "newStage",
          "type": "uint8"
        },
        {
          "indexed": false,
          "internalType": "uint256",
          "name": "timestamp",
          "type": "uint256"
        }
      ],
      "name": "StageUpdated",
      "type": "event"
    },
    {
      "inputs": [
        {
          "internalType": "address",
          "name": "admin",
          "type": "address"
        }
      ],
      "name": "addAdmin",
      "outputs": [],
      "stateMutability": "nonpayable",
      "type": "function"
    },
    {
      "inputs": [
        {
          "internalType": "address",
          "name": "auditor",
          "type": "address"
        }
      ],
      "name": "addAuditor",
      "outputs": [],
      "stateMutability": "nonpayable",
      "type": "function"
    },
    {
      "inputs": [
        {
          "internalType": "address",
          "name": "",
          "type": "address"
        }
      ],
      "name": "admins",
      "outputs": [
        {
          "internalType": "bool",
          "name": "",
          "type": "bool"
        }
      ],
      "stateMutability": "view",
      "type": "function",
      "constant": true
    },
    {
      "inputs": [
        {
          "internalType": "address",
          "name": "",
          "type": "address"
        }
      ],
      "name": "auditors",
      "outputs": [
        {
          "internalType": "bool",
          "name": "",
          "type": "bool"
        }
      ],
      "stateMutability": "view",
      "type": "function",
      "constant": true
    },
    {
      "inputs": [],
      "name": "batchCounter",
      "outputs": [
        {
          "internalType": "uint256",
          "name": "",
          "type": "uint256"
        }
      ],
      "stateMutability": "view",
      "type": "function",
      "constant": true
    },
    {
      "inputs": [
        {
          "internalType": "uint256",
          "name": "",
          "type": "uint256"
        }
      ],
      "name": "coffeeBatches",
      "outputs": [
        {
          "internalType": "uint256",
          "name": "batchId",
          "type": "uint256"
        },
        {
          "internalType": "uint256",
          "name": "farmId",
          "type": "uint256"
        },
        {
          "internalType": "enum CoffeeSupplyChain.CoffeeType",
          "name": "coffeeType",
          "type": "uint8"
        },
        {
          "internalType": "uint256",
          "name": "quantity",
          "type": "uint256"
        },
        {
          "internalType": "uint256",
          "name": "harvestDate",
          "type": "uint256"
        },
        {
          "internalType": "enum CoffeeSupplyChain.ProcessingMethod",
          "name": "processingMethod",
          "type": "uint8"
        },
        {
          "internalType": "enum CoffeeSupplyChain.Stage",
          "name": "currentStage",
          "type": "uint8"
        },
        {
          "internalType": "bool",
          "name": "isActive",
          "type": "bool"
        },
        {
          "internalType": "string",
          "name": "qualityGrade",
          "type": "string"
        },
        {
          "internalType": "uint256",
          "name": "moistureContent",
          "type": "uint256"
        },
        {
          "internalType": "string",
          "name": "certifications",
          "type": "string"
        }
      ],
      "stateMutability": "view",
      "type": "function",
      "constant": true
    },
    {
      "inputs": [
        {
          "internalType": "uint256",
          "name": "",
          "type": "uint256"
        },
        {
          "internalType": "uint256",
          "name": "",
          "type": "uint256"
        }
      ],
      "name": "distributionHistory",
      "outputs": [
        {
          "internalType": "uint256",
          "name": "batchId",
          "type": "uint256"
        },
        {
          "internalType": "uint256",
          "name": "distributorId",
          "type": "uint256"
        },
        {
          "internalType": "string",
          "name": "destination",
          "type": "string"
        },
        {
          "internalType": "uint256",
          "name": "shipmentDate",
          "type": "uint256"
        },
        {
          "internalType": "uint256",
          "name": "expectedDeliveryDate",
          "type": "uint256"
        },
        {
          "internalType": "string",
          "name": "transportMethod",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "trackingNumber",
          "type": "string"
        }
      ],
      "stateMutability": "view",
      "type": "function",
      "constant": true
    },
    {
      "inputs": [],
      "name": "distributorCounter",
      "outputs": [
        {
          "internalType": "uint256",
          "name": "",
          "type": "uint256"
        }
      ],
      "stateMutability": "view",
      "type": "function",
      "constant": true
    },
    {
      "inputs": [
        {
          "internalType": "address",
          "name": "",
          "type": "address"
        }
      ],
      "name": "distributorIds",
      "outputs": [
        {
          "internalType": "uint256",
          "name": "",
          "type": "uint256"
        }
      ],
      "stateMutability": "view",
      "type": "function",
      "constant": true
    },
    {
      "inputs": [],
      "name": "farmCounter",
      "outputs": [
        {
          "internalType": "uint256",
          "name": "",
          "type": "uint256"
        }
      ],
      "stateMutability": "view",
      "type": "function",
      "constant": true
    },
    {
      "inputs": [
        {
          "internalType": "address",
          "name": "",
          "type": "address"
        }
      ],
      "name": "farmerToFarmId",
      "outputs": [
        {
          "internalType": "uint256",
          "name": "",
          "type": "uint256"
        }
      ],
      "stateMutability": "view",
      "type": "function",
      "constant": true
    },
    {
      "inputs": [
        {
          "internalType": "uint256",
          "name": "",
          "type": "uint256"
        }
      ],
      "name": "farms",
      "outputs": [
        {
          "internalType": "uint256",
          "name": "farmId",
          "type": "uint256"
        },
        {
          "internalType": "string",
          "name": "farmerName",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "location",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "region",
          "type": "string"
        },
        {
          "internalType": "uint256",
          "name": "altitude",
          "type": "uint256"
        },
        {
          "internalType": "uint256",
          "name": "farmSize",
          "type": "uint256"
        },
        {
          "internalType": "string",
          "name": "coordinates",
          "type": "string"
        },
        {
          "internalType": "bool",
          "name": "isActive",
          "type": "bool"
        },
        {
          "internalType": "uint256",
          "name": "registrationDate",
          "type": "uint256"
        }
      ],
      "stateMutability": "view",
      "type": "function",
      "constant": true
    },
    {
      "inputs": [],
      "name": "owner",
      "outputs": [
        {
          "internalType": "address",
          "name": "",
          "type": "address"
        }
      ],
      "stateMutability": "view",
      "type": "function",
      "constant": true
    },
    {
      "inputs": [
        {
          "internalType": "uint256",
          "name": "",
          "type": "uint256"
        },
        {
          "internalType": "uint256",
          "name": "",
          "type": "uint256"
        }
      ],
      "name": "processingHistory",
      "outputs": [
        {
          "internalType": "uint256",
          "name": "batchId",
          "type": "uint256"
        },
        {
          "internalType": "uint256",
          "name": "processedBy",
          "type": "uint256"
        },
        {
          "internalType": "uint256",
          "name": "processedDate",
          "type": "uint256"
        },
        {
          "internalType": "uint256",
          "name": "inputQuantity",
          "type": "uint256"
        },
        {
          "internalType": "uint256",
          "name": "outputQuantity",
          "type": "uint256"
        },
        {
          "internalType": "string",
          "name": "processingNotes",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "qualityTests",
          "type": "string"
        }
      ],
      "stateMutability": "view",
      "type": "function",
      "constant": true
    },
    {
      "inputs": [],
      "name": "processorCounter",
      "outputs": [
        {
          "internalType": "uint256",
          "name": "",
          "type": "uint256"
        }
      ],
      "stateMutability": "view",
      "type": "function",
      "constant": true
    },
    {
      "inputs": [
        {
          "internalType": "address",
          "name": "",
          "type": "address"
        }
      ],
      "name": "processorIds",
      "outputs": [
        {
          "internalType": "uint256",
          "name": "",
          "type": "uint256"
        }
      ],
      "stateMutability": "view",
      "type": "function",
      "constant": true
    },
    {
      "inputs": [
        {
          "internalType": "uint256",
          "name": "",
          "type": "uint256"
        },
        {
          "internalType": "uint256",
          "name": "",
          "type": "uint256"
        }
      ],
      "name": "qualityTests",
      "outputs": [
        {
          "internalType": "uint256",
          "name": "batchId",
          "type": "uint256"
        },
        {
          "internalType": "uint256",
          "name": "testDate",
          "type": "uint256"
        },
        {
          "internalType": "string",
          "name": "testType",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "results",
          "type": "string"
        },
        {
          "internalType": "uint256",
          "name": "score",
          "type": "uint256"
        },
        {
          "internalType": "string",
          "name": "testerName",
          "type": "string"
        },
        {
          "internalType": "bool",
          "name": "passed",
          "type": "bool"
        }
      ],
      "stateMutability": "view",
      "type": "function",
      "constant": true
    },
    {
      "inputs": [
        {
          "internalType": "address",
          "name": "admin",
          "type": "address"
        }
      ],
      "name": "removeAdmin",
      "outputs": [],
      "stateMutability": "nonpayable",
      "type": "function"
    },
    {
      "inputs": [
        {
          "internalType": "address",
          "name": "auditor",
          "type": "address"
        }
      ],
      "name": "removeAuditor",
      "outputs": [],
      "stateMutability": "nonpayable",
      "type": "function"
    },
    {
      "inputs": [
        {
          "internalType": "address",
          "name": "newOwner",
          "type": "address"
        }
      ],
      "name": "transferOwnership",
      "outputs": [],
      "stateMutability": "nonpayable",
      "type": "function"
    },
    {
      "inputs": [
        {
          "internalType": "string",
          "name": "_farmerName",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "_location",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "_region",
          "type": "string"
        },
        {
          "internalType": "uint256",
          "name": "_altitude",
          "type": "uint256"
        },
        {
          "internalType": "uint256",
          "name": "_farmSize",
          "type": "uint256"
        },
        {
          "internalType": "string",
          "name": "_coordinates",
          "type": "string"
        }
      ],
      "name": "registerFarm",
      "outputs": [],
      "stateMutability": "nonpayable",
      "type": "function"
    },
    {
      "inputs": [
        {
          "internalType": "uint256",
          "name": "_farmId",
          "type": "uint256"
        },
        {
          "internalType": "string",
          "name": "_location",
          "type": "string"
        },
        {
          "internalType": "uint256",
          "name": "_farmSize",
          "type": "uint256"
        },
        {
          "internalType": "string",
          "name": "_coordinates",
          "type": "string"
        }
      ],
      "name": "updateFarmInfo",
      "outputs": [],
      "stateMutability": "nonpayable",
      "type": "function"
    },
    {
      "inputs": [
        {
          "internalType": "enum CoffeeSupplyChain.CoffeeType",
          "name": "_coffeeType",
          "type": "uint8"
        },
        {
          "internalType": "uint256",
          "name": "_quantity",
          "type": "uint256"
        },
        {
          "internalType": "enum CoffeeSupplyChain.ProcessingMethod",
          "name": "_processingMethod",
          "type": "uint8"
        },
        {
          "internalType": "string",
          "name": "_qualityGrade",
          "type": "string"
        },
        {
          "internalType": "uint256",
          "name": "_moistureContent",
          "type": "uint256"
        },
        {
          "internalType": "string",
          "name": "_certifications",
          "type": "string"
        }
      ],
      "name": "createCoffeeBatch",
      "outputs": [],
      "stateMutability": "nonpayable",
      "type": "function"
    },
    {
      "inputs": [
        {
          "internalType": "uint256",
          "name": "_batchId",
          "type": "uint256"
        },
        {
          "internalType": "enum CoffeeSupplyChain.Stage",
          "name": "_newStage",
          "type": "uint8"
        }
      ],
      "name": "updateBatchStage",
      "outputs": [],
      "stateMutability": "nonpayable",
      "type": "function"
    },
    {
      "inputs": [
        {
          "internalType": "address",
          "name": "_processor",
          "type": "address"
        }
      ],
      "name": "registerProcessor",
      "outputs": [],
      "stateMutability": "nonpayable",
      "type": "function"
    },
    {
      "inputs": [
        {
          "internalType": "uint256",
          "name": "_batchId",
          "type": "uint256"
        },
        {
          "internalType": "uint256",
          "name": "_inputQuantity",
          "type": "uint256"
        },
        {
          "internalType": "uint256",
          "name": "_outputQuantity",
          "type": "uint256"
        },
        {
          "internalType": "string",
          "name": "_processingNotes",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "_qualityTests",
          "type": "string"
        }
      ],
      "name": "addProcessingRecord",
      "outputs": [],
      "stateMutability": "nonpayable",
      "type": "function"
    },
    {
      "inputs": [
        {
          "internalType": "address",
          "name": "_distributor",
          "type": "address"
        }
      ],
      "name": "registerDistributor",
      "outputs": [],
      "stateMutability": "nonpayable",
      "type": "function"
    },
    {
      "inputs": [
        {
          "internalType": "uint256",
          "name": "_batchId",
          "type": "uint256"
        },
        {
          "internalType": "string",
          "name": "_destination",
          "type": "string"
        },
        {
          "internalType": "uint256",
          "name": "_expectedDeliveryDate",
          "type": "uint256"
        },
        {
          "internalType": "string",
          "name": "_transportMethod",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "_trackingNumber",
          "type": "string"
        }
      ],
      "name": "addDistributionRecord",
      "outputs": [],
      "stateMutability": "nonpayable",
      "type": "function"
    },
    {
      "inputs": [
        {
          "internalType": "uint256",
          "name": "_batchId",
          "type": "uint256"
        },
        {
          "internalType": "string",
          "name": "_testType",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "_results",
          "type": "string"
        },
        {
          "internalType": "uint256",
          "name": "_score",
          "type": "uint256"
        },
        {
          "internalType": "string",
          "name": "_testerName",
          "type": "string"
        },
        {
          "internalType": "bool",
          "name": "_passed",
          "type": "bool"
        }
      ],
      "name": "addQualityTest",
      "outputs": [],
      "stateMutability": "nonpayable",
      "type": "function"
    },
    {
      "inputs": [
        {
          "internalType": "uint256",
          "name": "_farmId",
          "type": "uint256"
        }
      ],
      "name": "getFarmDetails",
      "outputs": [
        {
          "components": [
            {
              "internalType": "uint256",
              "name": "farmId",
              "type": "uint256"
            },
            {
              "internalType": "string",
              "name": "farmerName",
              "type": "string"
            },
            {
              "internalType": "string",
              "name": "location",
              "type": "string"
            },
            {
              "internalType": "string",
              "name": "region",
              "type": "string"
            },
            {
              "internalType": "uint256",
              "name": "altitude",
              "type": "uint256"
            },
            {
              "internalType": "uint256",
              "name": "farmSize",
              "type": "uint256"
            },
            {
              "internalType": "string",
              "name": "coordinates",
              "type": "string"
            },
            {
              "internalType": "bool",
              "name": "isActive",
              "type": "bool"
            },
            {
              "internalType": "uint256",
              "name": "registrationDate",
              "type": "uint256"
            }
          ],
          "internalType": "struct CoffeeSupplyChain.Farm",
          "name": "",
          "type": "tuple"
        }
      ],
      "stateMutability": "view",
      "type": "function",
      "constant": true
    },
    {
      "inputs": [
        {
          "internalType": "uint256",
          "name": "_batchId",
          "type": "uint256"
        }
      ],
      "name": "getBatchDetails",
      "outputs": [
        {
          "components": [
            {
              "internalType": "uint256",
              "name": "batchId",
              "type": "uint256"
            },
            {
              "internalType": "uint256",
              "name": "farmId",
              "type": "uint256"
            },
            {
              "internalType": "enum CoffeeSupplyChain.CoffeeType",
              "name": "coffeeType",
              "type": "uint8"
            },
            {
              "internalType": "uint256",
              "name": "quantity",
              "type": "uint256"
            },
            {
              "internalType": "uint256",
              "name": "harvestDate",
              "type": "uint256"
            },
            {
              "internalType": "enum CoffeeSupplyChain.ProcessingMethod",
              "name": "processingMethod",
              "type": "uint8"
            },
            {
              "internalType": "enum CoffeeSupplyChain.Stage",
              "name": "currentStage",
              "type": "uint8"
            },
            {
              "internalType": "bool",
              "name": "isActive",
              "type": "bool"
            },
            {
              "internalType": "string",
              "name": "qualityGrade",
              "type": "string"
            },
            {
              "internalType": "uint256",
              "name": "moistureContent",
              "type": "uint256"
            },
            {
              "internalType": "string",
              "name": "certifications",
              "type": "string"
            }
          ],
          "internalType": "struct CoffeeSupplyChain.CoffeeBatch",
          "name": "",
          "type": "tuple"
        }
      ],
      "stateMutability": "view",
      "type": "function",
      "constant": true
    },
    {
      "inputs": [
        {
          "internalType": "uint256",
          "name": "_batchId",
          "type": "uint256"
        }
      ],
      "name": "getProcessingHistory",
      "outputs": [
        {
          "components": [
            {
              "internalType": "uint256",
              "name": "batchId",
              "type": "uint256"
            },
            {
              "internalType": "uint256",
              "name": "processedBy",
              "type": "uint256"
            },
            {
              "internalType": "uint256",
              "name": "processedDate",
              "type": "uint256"
            },
            {
              "internalType": "uint256",
              "name": "inputQuantity",
              "type": "uint256"
            },
            {
              "internalType": "uint256",
              "name": "outputQuantity",
              "type": "uint256"
            },
            {
              "internalType": "string",
              "name": "processingNotes",
              "type": "string"
            },
            {
              "internalType": "string",
              "name": "qualityTests",
              "type": "string"
            }
          ],
          "internalType": "struct CoffeeSupplyChain.ProcessingRecord[]",
          "name": "",
          "type": "tuple[]"
        }
      ],
      "stateMutability": "view",
      "type": "function",
      "constant": true
    },
    {
      "inputs": [
        {
          "internalType": "uint256",
          "name": "_batchId",
          "type": "uint256"
        }
      ],
      "name": "getDistributionHistory",
      "outputs": [
        {
          "components": [
            {
              "internalType": "uint256",
              "name": "batchId",
              "type": "uint256"
            },
            {
              "internalType": "uint256",
              "name": "distributorId",
              "type": "uint256"
            },
            {
              "internalType": "string",
              "name": "destination",
              "type": "string"
            },
            {
              "internalType": "uint256",
              "name": "shipmentDate",
              "type": "uint256"
            },
            {
              "internalType": "uint256",
              "name": "expectedDeliveryDate",
              "type": "uint256"
            },
            {
              "internalType": "string",
              "name": "transportMethod",
              "type": "string"
            },
            {
              "internalType": "string",
              "name": "trackingNumber",
              "type": "string"
            }
          ],
          "internalType": "struct CoffeeSupplyChain.DistributionRecord[]",
          "name": "",
          "type": "tuple[]"
        }
      ],
      "stateMutability": "view",
      "type": "function",
      "constant": true
    },
    {
      "inputs": [
        {
          "internalType": "uint256",
          "name": "_batchId",
          "type": "uint256"
        }
      ],
      "name": "getQualityTests",
      "outputs": [
        {
          "components": [
            {
              "internalType": "uint256",
              "name": "batchId",
              "type": "uint256"
            },
            {
              "internalType": "uint256",
              "name": "testDate",
              "type": "uint256"
            },
            {
              "internalType": "string",
              "name": "testType",
              "type": "string"
            },
            {
              "internalType": "string",
              "name": "results",
              "type": "string"
            },
            {
              "internalType": "uint256",
              "name": "score",
              "type": "uint256"
            },
            {
              "internalType": "string",
              "name": "testerName",
              "type": "string"
            },
            {
              "internalType": "bool",
              "name": "passed",
              "type": "bool"
            }
          ],
          "internalType": "struct CoffeeSupplyChain.QualityTest[]",
          "name": "",
          "type": "tuple[]"
        }
      ],
      "stateMutability": "view",
      "type": "function",
      "constant": true
    },
    {
      "inputs": [
        {
          "internalType": "uint256",
          "name": "_farmId",
          "type": "uint256"
        }
      ],
      "name": "getBatchesByFarm",
      "outputs": [
        {
          "internalType": "uint256[]",
          "name": "",
          "type": "uint256[]"
        }
      ],
      "stateMutability": "view",
      "type": "function",
      "constant": true
    },
    {
      "inputs": [
        {
          "internalType": "uint256",
          "name": "_batchId",
          "type": "uint256"
        }
      ],
      "name": "getFullTraceability",
      "outputs": [
        {
          "components": [
            {
              "internalType": "uint256",
              "name": "batchId",
              "type": "uint256"
            },
            {
              "internalType": "uint256",
              "name": "farmId",
              "type": "uint256"
            },
            {
              "internalType": "enum CoffeeSupplyChain.CoffeeType",
              "name": "coffeeType",
              "type": "uint8"
            },
            {
              "internalType": "uint256",
              "name": "quantity",
              "type": "uint256"
            },
            {
              "internalType": "uint256",
              "name": "harvestDate",
              "type": "uint256"
            },
            {
              "internalType": "enum CoffeeSupplyChain.ProcessingMethod",
              "name": "processingMethod",
              "type": "uint8"
            },
            {
              "internalType": "enum CoffeeSupplyChain.Stage",
              "name": "currentStage",
              "type": "uint8"
            },
            {
              "internalType": "bool",
              "name": "isActive",
              "type": "bool"
            },
            {
              "internalType": "string",
              "name": "qualityGrade",
              "type": "string"
            },
            {
              "internalType": "uint256",
              "name": "moistureContent",
              "type": "uint256"
            },
            {
              "internalType": "string",
              "name": "certifications",
              "type": "string"
            }
          ],
          "internalType": "struct CoffeeSupplyChain.CoffeeBatch",
          "name": "batch",
          "type": "tuple"
        },
        {
          "components": [
            {
              "internalType": "uint256",
              "name": "farmId",
              "type": "uint256"
            },
            {
              "internalType": "string",
              "name": "farmerName",
              "type": "string"
            },
            {
              "internalType": "string",
              "name": "location",
              "type": "string"
            },
            {
              "internalType": "string",
              "name": "region",
              "type": "string"
            },
            {
              "internalType": "uint256",
              "name": "altitude",
              "type": "uint256"
            },
            {
              "internalType": "uint256",
              "name": "farmSize",
              "type": "uint256"
            },
            {
              "internalType": "string",
              "name": "coordinates",
              "type": "string"
            },
            {
              "internalType": "bool",
              "name": "isActive",
              "type": "bool"
            },
            {
              "internalType": "uint256",
              "name": "registrationDate",
              "type": "uint256"
            }
          ],
          "internalType": "struct CoffeeSupplyChain.Farm",
          "name": "farm",
          "type": "tuple"
        },
        {
          "components": [
            {
              "internalType": "uint256",
              "name": "batchId",
              "type": "uint256"
            },
            {
              "internalType": "uint256",
              "name": "processedBy",
              "type": "uint256"
            },
            {
              "internalType": "uint256",
              "name": "processedDate",
              "type": "uint256"
            },
            {
              "internalType": "uint256",
              "name": "inputQuantity",
              "type": "uint256"
            },
            {
              "internalType": "uint256",
              "name": "outputQuantity",
              "type": "uint256"
            },
            {
              "internalType": "string",
              "name": "processingNotes",
              "type": "string"
            },
            {
              "internalType": "string",
              "name": "qualityTests",
              "type": "string"
            }
          ],
          "internalType": "struct CoffeeSupplyChain.ProcessingRecord[]",
          "name": "processing",
          "type": "tuple[]"
        },
        {
          "components": [
            {
              "internalType": "uint256",
              "name": "batchId",
              "type": "uint256"
            },
            {
              "internalType": "uint256",
              "name": "distributorId",
              "type": "uint256"
            },
            {
              "internalType": "string",
              "name": "destination",
              "type": "string"
            },
            {
              "internalType": "uint256",
              "name": "shipmentDate",
              "type": "uint256"
            },
            {
              "internalType": "uint256",
              "name": "expectedDeliveryDate",
              "type": "uint256"
            },
            {
              "internalType": "string",
              "name": "transportMethod",
              "type": "string"
            },
            {
              "internalType": "string",
              "name": "trackingNumber",
              "type": "string"
            }
          ],
          "internalType": "struct CoffeeSupplyChain.DistributionRecord[]",
          "name": "distribution",
          "type": "tuple[]"
        },
        {
          "components": [
            {
              "internalType": "uint256",
              "name": "batchId",
              "type": "uint256"
            },
            {
              "internalType": "uint256",
              "name": "testDate",
              "type": "uint256"
            },
            {
              "internalType": "string",
              "name": "testType",
              "type": "string"
            },
            {
              "internalType": "string",
              "name": "results",
              "type": "string"
            },
            {
              "internalType": "uint256",
              "name": "score",
              "type": "uint256"
            },
            {
              "internalType": "string",
              "name": "testerName",
              "type": "string"
            },
            {
              "internalType": "bool",
              "name": "passed",
              "type": "bool"
            }
          ],
          "internalType": "struct CoffeeSupplyChain.QualityTest[]",
          "name": "quality",
          "type": "tuple[]"
        }
      ],
      "stateMutability": "view",
      "type": "function",
      "constant": true
    }
  ]
// Sample ABI (shortened for brevity – use full ABI from compilation)
const abi = [
    {
      "inputs": [
        {
          "internalType": "string",
          "name": "_firstName",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "_lastName",
          "type": "string"
        },
        {
          "internalType": "uint256",
          "name": "_number",
          "type": "uint256"
        }
      ],
      "name": "saveUser",
      "outputs": [],
      "stateMutability": "nonpayable",
      "type": "function"
    },
    {
      "inputs": [],
      "name": "getUser",
      "outputs": [
        {
          "internalType": "string",
          "name": "",
          "type": "string"
        },
        {
          "internalType": "string",
          "name": "",
          "type": "string"
        },
        {
          "internalType": "uint256",
          "name": "",
          "type": "uint256"
        }
      ],
      "stateMutability": "view",
      "type": "function",
      "constant": true
    }
  ]