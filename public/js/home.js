

// //Giỏ Hàng

// // var remoteCartItemsButtons = document.getElementsByClassName('btn-danger')
// // console.log(remoteCartItemsButtons)
// // for(var i = 0; i < remoteCartItemsButtons.length; i++)
// // {
// // 	var button = remoteCartItemsButtons[i]
// // 	button.addEventListener('click', function(event){
// // 		var buttonClicked = event.target
// // 		buttonClicked.parentElement.parentElement.remove()
// // 		updateCartTotal() 
// // 	})
// // }


// // function updateCartTotal() 
// // {
// // 	 var cartItemsContrainer = document.getElementsByClassName('cart-items')[0]
// // 	 var cartRows = cartItemsContrainer.getElementsByClassName('cart-row')
// // 	 var total = 0
// // 	 for(var i = 0; i < cartRows.length; i++)
// // 	{
// // 		var cartRow = cartRows[i]
// // 		var priceElement = cartRow.getElementsByClassName('cart-price')[0]
// // 		var quantityElement = cartRow.getElementsByClassName('cart-quantity')[0]
// // 		// var parsePrice = priceElement.innerText.toLocaleString()
// // 		// console.log(parsePrice)
// // 		var prices = priceElement.innerText.replace(' VND','')
// // 		var price = prices.replace(/,/g, '.')
// // 		var quantity = quantityElement.value
// // 		total = total + ( price*quantity )
// // 		console.log(1*2.111)
// // 	}
// // 	// document.getElementsByClassName('cartSubTotal')[0].innerText = total + ' VND'
// // }

// //khai bao gio hang rong
// var cart =[];
// $(document).ready(function() {
	
// 	$('.addTocart').on('click', function(){
// 		var proId = $(this).attr('productId');
// 		var pName = $('#pro-'+proId).find('#product-name').text();
// 		var imageURL = $('#pro-'+proId).find('img').attr('src');
// 		var priceSale =  $('#pro-'+proId).find('.priceSale').text().replace('Giảm còn :','').replace('VND','');
// 		var priceDB = $('#pro-'+proId).find('.priceDB').text().replace('VND', '');
		
// 		// console.log(priceSale, priceDB);
// 		// console.log( typeof priceDB);
// 		// priceDB = parseFloat(priceDB);
// 		// console.log( typeof priceDB);
// 		// console.log(priceSale, priceDB);
// 		let priceDBs = numeral(priceDB);
// 			a = priceDBs.format('0,0');
// 			console.log(a);
// 			console.log( typeof a);
// 		//check co ton tai gia Sale hay khong.
// 		if(!priceSale){
// 			price = priceDB;
// 		}
// 		else {
// 			price =priceSale;
// 		}
// 		// var total = price*quantity
// 		var obj = {
// 			id:          proId,
// 			productName: pName,
// 			image: imageURL,
// 			price:price
// 		};
// 		//check san pham ton tai trong gio hang hay chua
// 		var flag = false;
// 		for(var i =0; i< cart.length;i++){
// 			if(cart[i].id == obj.id)
// 			{
// 				flag = true;
// 				break;
// 			}
// 		}
// 		//san pham chua co trong gio hang
// 		if(flag === false)
// 		{
// 			obj.quantity = 1;
// 			cart.push(obj);
// 		} else { //san pham da co trong gio hang
// 			cart[i].quantity +=1;
// 		}
// 		alert('Thêm sản phẩm vào giỏ hàng thành công!');
// 		showCart();
// 		// debugger;
// 	});
// });
// function showCart(){
	
// 		$('tbody.cart-items').empty();
// 		var ckUnit =  " ";
// 		for(var i =0; i< cart.length;i++){
// 			ckUnit += `<tr class="cart-row">
// 			<td>
// 			<a href="#"><img src="${cart[i].image}" class="img-responsive" alt=""/></a>
// 			</td>
// 			<td> <h6>${cart[i].productName}</h6>
// 			</td> 
// 			<td><div class="cart-price"> ${ cart[i].price } VND</div>
// 			</td> 
// 			<td><input type="number" min="1" value="${cart[i].quantity}" class="cart-quantity">
// 			</td> 
// 			<td><div class="cart-subtotal">${cart[i].quantity * cart[i].price}</div>
// 			</td>
// 			<td><button class="btn btn-danger"><i class="fa fa-times"></i></button>
// 			</td>
// 			</tr>
// 			`;
			
// // debugger;
// 		}
// 		$('tbody.cart-items').append(ckUnit);
// }

//khai bao bien carts 
//  let carts = document.querySelectorAll('.addTocart');
//  //lap carts de lay san pham
//  for(var i = 0; i < carts.length ; i++)
//  {
//  	carts[i].addEventListener('click', () =>{
//  		cartNumber();
//  		getProducts();

//  	})
//  }
// function getProducts() {
// 	var cartItemsContrainer = document.getElementsByClassName('.compare-button ').find('.icon-bag');
// 	let productID = document.querySelector('.compare-button .icon-bag');
// 	debugger;
// 	let products = [
// 	{
// 		name : 'san pham test',
// 		price : 15
// 	}
// 	];
// 	console.log(products);
// }
// //load tong so spham ra the span noi icon gio hang
//  function onLoadCartNumbers()
//  {
//  	let productNumbers = localStorage.getItem('cartNumbers');
//  	if( productNumbers )
//  	{
//  		document.querySelector('.cart-toggler span').textContent = productNumbers ;
//  	}
//  }


// //tổng sản phẩm trong giỏ hàng
//  function cartNumber()
//  {
//  	let productNumbers = localStorage.getItem('cartNumbers');
//  	productNumbers = parseInt(productNumbers);
//  	if( productNumbers )//neu ton tai so san pham noi localstrorage thi cong them 1
//  	{
//  		localStorage.setItem('cartNumbers', productNumbers + 1);
//  		document.querySelector('.cart-toggler span').textContent = productNumbers + 1;
//  	}else{//neu khong ton tai thi gan bang 1
//  		localStorage.setItem('cartNumbers', 1);
//  		document.querySelector('.cart-toggler span').textContent = 1;
//  	}
 	
//  }
// //goi ham load tong so sp ra the span
//  onLoadCartNumbers();