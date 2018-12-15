module.exports = {
	identity: 'wishlist',
	
	connection: 'mysqlDB',
	schema:true,
	migrate: 'safe',
	
	attributes: {
		
		post_id: {
			type: 'String',
            unique: true,
            required: true
			},
		photo:'text',
		text:'text',
		username:'text',
	}
};
