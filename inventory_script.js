//Variables
var sum = 0;
var num = 0;
var product_details = [];
var counter = 0;
var lastnum = 0;


// Side Nav Section //
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").setAttribute("style" , "margin-left: 250px;");
}


function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").setAttribute("style" , "margin-left: 0px;");
}

// Overlay Input
function on(class_n) {
	var class_name = class_n;
    document.getElementById(class_name).style.display = "block";
}

function off(class_n) {
	var class_name = class_n;
	document.getElementById(class_name).style.display = "none";
}


//Change Done Transaction To Quantity Vice Versa
function change(val){
	var tag;
	if(val == 1){
		if(tag = document.getElementById("cash")){
			tag.id = "quantity";
			tag.placeholder = "Input Quantity";
		}
	}
	else{
		if(tag = document.getElementById("quantity")){
			tag.id = "cash";
			tag.placeholder = "Input Cash";
		}
	}
}



//POS Table Section//
function getTotal() {

	var price = document.querySelectorAll("td:nth-child(4)");
	var quantity = document.querySelectorAll("td:nth-child(3)");
	if(price != NaN && quantity != NaN){
		for (var i = 0; i < price.length; i++) {
		   var priceval = parseFloat(price[i].firstChild.data);
		   var quantityval = parseFloat(quantity[i].firstChild.data);
		   amountsum = (priceval * quantityval);
		   sum += (priceval * quantityval);
		}
		document.getElementById("total").innerHTML = sum ;
	}


}


//Getting the ID

var itemNumber = 0;
function getItemNumber(value){
	itemNumber = parseInt(value) - 1;
}


//Verify Double
function verifyItems(){
	var id = document.querySelectorAll("td:nth-child(1)");
	var quantity = document.querySelectorAll("td:nth-child(3)");
	change(1);
	lastnum = 0;
	if(parseInt(document.getElementById("quantity").value)){
		try{
			for(var i = 0; i < counter; i++){
				if(parseInt(id[i].firstChild.data)){
					if(parseInt(id[i].firstChild.data)-1 == parseInt(itemNumber)){
						lastnum = parseInt(quantity[i].firstChild.data);
						var row = document.getElementById(parseInt(id[i].firstChild.data));
						var parent = row.parentNode;
						parent.removeChild(row);
						break;
					}
				}
			}
			orderedProducts();
		}
		catch(err){
			orderedProducts();
		}
	}
	else{
		alert("Invalid Input!");
	}

}

//Add Item to Table

function orderedProducts(){
	var value = document.getElementById("quantity").value;
	document.getElementById("quantity").value = "";

	var itemid = document.createElement("td");
	var id = itemNumber + 1;
	var nodeid = document.createTextNode(id);
	itemid.appendChild(nodeid);

	var itemname = document.createElement("td");
	var nodename = document.createTextNode(product_details[parseInt(itemNumber)][1]);
	itemname.appendChild(nodename);
	
	var itemquantity = document.createElement("td");
	var quantity = parseInt(value);
	var nodequantity = document.createTextNode(parseInt(quantity) + lastnum	);
	itemquantity.appendChild(nodequantity);

	var itemprice = document.createElement("td");
	var price = product_details[parseInt(itemNumber)][2];
	var nodeprice = document.createTextNode(price);
	itemprice.appendChild(nodeprice);
	
	var itemamount = document.createElement("td");
	var amount = parseInt(price) * (quantity + lastnum);
	var nodeamount = document.createTextNode("" + amount);
	itemamount.appendChild(nodeamount);
	var node1 = document.createElement("tr");
	node1.setAttribute("id", itemNumber+1);
    node1.appendChild(itemid);
    node1.appendChild(itemname);
    node1.appendChild(itemquantity);
    node1.appendChild(itemprice);
    node1.appendChild(itemamount);
    document.getElementById("table").appendChild(node1);
    counter++;
    getTotal();
}



//Item Section
function getProducts(name, price, id,prod_quantity){
	var itemid = document.createElement("td");
	var nodeid = document.createTextNode(id);
	itemid.appendChild(nodeid);

	var itemname = document.createElement("td");
	var nodename = document.createTextNode(name);
	itemname.setAttribute("contenteditable", "true");
	itemname.setAttribute("onfocusout","javascript:on('overlay');getName(this.innerHTML);");
	itemname.appendChild(nodename);
	
	var itemquantity = document.createElement("td");
	var nodequantity = document.createTextNode(prod_quantity);
	itemquantity.setAttribute("contenteditable", "true");
	itemquantity.setAttribute("onfocusout","javascript:on('overlay');getName(this.innerHTML);");
	itemquantity.appendChild(nodequantity);

	var itemprice = document.createElement("td");
	var nodeprice = document.createTextNode(price);
	var cell_name = 
	itemprice.setAttribute("contenteditable", "true");
	itemprice.setAttribute("onfocusout","javascript:on('overlay');getName(thisinnerHTML);");
	itemprice.appendChild(nodeprice);

	var node1 = document.createElement("tr");
	node1.setAttribute("value", id);

    node1.appendChild(itemid);
    node1.appendChild(itemname);
    node1.appendChild(itemprice);
    node1.appendChild(itemquantity);

    document.getElementById("table").appendChild(node1);
    counter++;
	num++;
}



//Search Section

function searchProduct(){
	var myNode = document.getElementById("prod");
	while (myNode.firstChild) {
	    myNode.removeChild(myNode.firstChild);
	}
	var search = false;
	for(var i = 0; i < product_details.length; i++){
		if(parseInt(document.getElementById("search").value)){
			if(product_details[i][0] == parseInt(document.getElementById("search").value)){
				var node2 = document.createElement("form");
				node2.setAttribute("id", "products-" + i);
				// node2.setAttribute("action", "javascript:orderedProducts();");
				node2.setAttribute("method", "POST");
				// document.getElementById("prod").appendChild(node2);
				// var node1 = document.createElement("input");
				// node1.setAttribute("type", "hidden");
				// node1.setAttribute("name", "btn-value");
				// node1.setAttribute("value","" + product_details[i][1]);

				// node2.insertBefore(node1, node2.childNodes[0]);
				var node = document.createElement("button");
				node.setAttribute("class", "item-button");
				node.setAttribute("value" , product_details[i][0]);
				node.setAttribute("type", "submit");
				node.setAttribute("onclick", "javascript: getItemNumber(this.value);on();");
				var nodename = document.createTextNode(product_details[i][1]);
				node.appendChild(nodename);
				document.getElementById("prod").appendChild(node);
				search = true;
			}
		}
		else{
			if(product_details[i][1].toLowerCase().includes(document.getElementById("search").value.toLowerCase(), 0)){
				var node2 = document.createElement("form");
				node2.setAttribute("id", "products-" + i);
				// node2.setAttribute("action", "javascript:orderedProducts();");
				node2.setAttribute("method", "POST");
				// document.getElementById("prod").appendChild(node2);
				// var node1 = document.createElement("input");
				// node1.setAttribute("type", "hidden");
				// node1.setAttribute("name", "btn-value");
				// node1.setAttribute("value","" + product_details[i][1]);

				// node2.insertBefore(node1, node2.childNodes[0]);
				var node = document.createElement("button");
				node.setAttribute("class", "item-button");
				node.setAttribute("value" , product_details[i][0]);
				node.setAttribute("type", "submit");
				node.setAttribute("onclick", "javascript: getItemNumber(this.value);on();");
				var nodename = document.createTextNode(product_details[i][1]);
				node.appendChild(nodename);
				document.getElementById("prod").appendChild(node);
				search = true;
			}
		}
	}
	if(search == false){
		var node = document.createElement("p");
		var nodename = document.createTextNode("No Match Found!");
		node.appendChild(nodename);
		document.getElementById("prod").appendChild(node);
	}



}

function getName(cell_name){
	alert(cell_name);
}

function saveChanges(){

}