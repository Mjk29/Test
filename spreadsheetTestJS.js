function testFun() {
	// readSingleFile("invJson.txt")
	readTextFile("invJson.txt")
}


function readSingleFile(e) {
  // var file = e.target.files[0];
  if (!e) {
    return;
  }
  var reader = new FileReader();
  reader.onload = function(e) {
    var contents = e.target.result;
    displayContents(contents);
  };
  reader.readAsText(e);
}

function displayContents(contents) {
  // var element = document.getElementById('file-content');
  // element.textContent = contents;
  console.log(contents)
}

document.getElementById('file-input')
  .addEventListener('change', readSingleFile, false);




function readTextFile(file){
	allText = ""
    var rawFile = new XMLHttpRequest();
    rawFile.open("GET", file, false);
    rawFile.onreadystatechange = function (){
        if(rawFile.readyState === 4){
            if(rawFile.status === 200 || rawFile.status == 0){
                var allText = rawFile.responseText;
                console.log("working");
                printText(allText)
            }
        }
    }

    // console.log(allText)
    rawFile.send(null);
}



function printText(text) {
	// console.log(text.length)

	jsontext = JSON.parse(text)
	console.log(jsontext)
	console.log(jsontext.length)
	url = "sqlPHPRx.php"
	// console.log(JSON.stringify(jsontext))
	

	for (var i = jsontext.length - 1; i >= 0; i--) {
		console.log(typeof(JSON.stringify(jsontext[i])))
		$.ajax({
			type: 'POST',
			url: url,
			// datatype: "json",
			data: jsontext[i],
			success: function (data) {
				console.log(data)
			},
			retdata : {'name':"name1"},
		});
	}



	// for (var i = jsontext.length - 1; i >= 0; i--) {
	$.ajax({
		type: "POST",
		url: url,
		datatype: "json",
		data: jsontext,
		success: function (data) {
     		console.log(data);
		 },
		// retdata : {'name':"name1"},
	});

    }

	// }

	// for (var i = jsontext.length - 1; i >= 0; i--) {
	// 	// console.log(jsontext[i])
		
	// }



function fieldAdd() {

	var objectToAdd ={

	SKU: document.getElementById("sku").value,
	Name: document.getElementById("name").value,
	Keywords: document.getElementById("Keywords").value,
	Description: document.getElementById("Description").value,
	Consumable :document.getElementById("Consumable").checked,
	Availability: document.getElementById("Availability").value,
	Price: document.getElementById("price").value,
	Link :document.getElementById("link").value,
	Image :document.getElementById("imgUrl").value,
	Location: document.getElementById("location").value,
	POSTTYPE : "item"
}

console.log(objectToAdd)

if (objectToAdd.Consumable) {
	objectToAdd.Consumable = 1
}
else{
	objectToAdd.Consumable = 0
}
	// console.log(objectToAdd.Consumable)


url = "sqlPHPRx.php"
	$.ajax({
			type: 'POST',
			url: url,
			// datatype: "json",
			data: objectToAdd,
			success: function (data) {
				console.log(data)
			},
			retdata : {'name':"name1"},
		});



}




function addUser() {
	var newUser = {
	UCID: document.getElementById("UCID").value,
	Name: document.getElementById("uName").value,
	Address: document.getElementById("Address").value,
	POSTTYPE : "user"

	}


	url = "sqlPHPRx.php"
	$.ajax({
			type: 'POST',
			url: url,
			// datatype: "json",
			data: newUser,
			success: function (data) {
				console.log(data)
			},
			retdata : {'name':"name1"},
		});



}




function addTx() {
	txData = {
		transactionID: document.getElementById("TID").value,
		UCID: document.getElementById("txUCID").value,
		Name: document.getElementById("txName").value,
		Total: document.getElementById("Total").value,
		Item: document.getElementById("Item").value,
		POSTTYPE : "tx"
	}
	url = "sqlPHPRx.php"
	$.ajax({
			type: 'POST',
			url: url,
			// datatype: "json",
			data: txData,
			success: function (data) {
				console.log(data)
			},
			retdata : {'name':"name1"},
		});
}


function getTableData() {

	sendData = {
		tableName: $("input[name='tableName']:checked").val(),
		POSTTYPE: "get"
	}
	url = "sqlPHPRx.php"

	$.ajax({
			type: 'POST',
			url: url,
			// datatype: "json",
			data: sendData,
			success: function (data) {
				console.log(data)
			},
			retdata : {'name':"name1"},
		});


}