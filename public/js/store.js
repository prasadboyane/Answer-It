var qstns = [];
var votes = [];
var qstns_pub = [];
var published =[];

function votestore(q_vote,q_id) {
//console.log(q_id+" is divHide and VoteCount is "+q_vote);
$("#"+q_id).hide();
qstns.push(q_id);
votes.push(q_vote);
 }

/*function approval(q_approval,q_id){
	$("#"+q_id).hide();
 	qstns_pub.push(q_id);
 	published.push(q_approval);
 }
*/

 function f_submit(){

 	document.getElementById("votes").value = votes;
 	document.getElementById("qstns").value = qstns;
 	console.log(document.getElementById("votes").value);
 	console.log(document.getElementById("qstns").value);
 	 $('#submit1').click();
 	//document.getElementById("submit").onclick();
 	console.log("pressed submit");
 }