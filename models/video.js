module.exports = {
	identity: 'video',
	
	connection: 'mysqlDB',
	schema:true,
	migrate: 'safe',
	
	attributes: {
		
		name: 'text',
		url:'text',
		type:'text',
		username:'text',
	}
};
