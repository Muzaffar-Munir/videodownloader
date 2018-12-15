#for Answer save use this end of api

/bot/a

#json Data to POST
{
  "q":"when will start oppo",
  "a":"oppo start in 2018",
  "username":"aneesijjaz"
}
# json Responce 

{
	"status":"success",
	"data":"ans saved ..."
}
*****************************************

#for send Question to answer REST end of API

/bot/q

#json Data to POST
{
	"q":"when start oppo",
	"username":"aneesijjaz"
}

*********Responce**************

#in case not found

{
    "status": "error",
    "data": "No Match Found"
}

#in case found
{
    "status": "success",
    "data": "oppo start in 2018",
    "intensity": 0.8571428571428571
}
