var mysqlAdapter = require('sails-mysql');
var mongoAdapter = require('sails-mongo');

module.exports = {
	adapters: {
		mongoAdapt: mongoAdapter,
		mysqlAdapt: mysqlAdapter
	},

  connections: {
/*
	mongoDB: {
		adapter: 'mongoAdapt',
		module: 'sails-mongo',
		url: "mongodb://localhost:27017/test9"
	},
*/
    mysqlDB: {
		adapter: 'mysqlAdapt',
		host: 'localhost',
		database: 'youtube',
		user:'root',
		password:'muzaffar',
		supportBigNumbers:true, //true/false
		debug:['ComQueryPacket'], //false or array of node-mysql debug options
		trace:true //true/false
    } 
  }
};
