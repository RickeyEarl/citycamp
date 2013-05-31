function getPermitNumber(data){
	for(x=0;x<=data.features.length;x++){
		permitNumber = fixPermitNumber(permitNumber = data.features[x].attributes.PERMIT_NUMBER);		
		console.log(permitNumber);
	}
}

function fixPermitNumber(number){
	var numberArr = number.split(" ");
	return numberArr[0] + "-" + numberArr[1];
}