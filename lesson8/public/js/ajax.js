// JavaScript Document

function register(){
	var login = encodeURI(document.getElementById('login').value);
	var password = encodeURI(document.getElementById('pass').value);
	var rememberme = encodeURI(document.getElementById('rememberme').checked);
	var rememberme2 = encodeURI(document.getElementById('rememberme').checked);
          $.ajax({ type: 'POST', url: '/index.php', data: { metod: 'ajax', PageAjax: 'register', var3: rememberme2, login: login, pass: password, rememberme: rememberme}, success: function(response){
                    $('#autorize').html(response);
                 },
				 dataType:"json"
          });
};


 
function add_basket(var3) { 
 var var4 = $(var3).attr("data-product-guid");
 var count = encodeURI(document.getElementById('i2').value);
          $.ajax({ type: 'POST', url: 'index.php', data: { metod: 'ajax', PageAjax: 'basket', var4: var4, count: count}, success: function(response){
                    $('#basket').html(response);
                 },
				 dataType:"json"
          });
   }

 function add_basket_one(var3) { 
 var var4 = $(var3).attr("data-product-guid");
          $.ajax({ type: 'POST', url: 'index.php', data: { metod: 'ajax', PageAjax: 'basket', var4: var4}, success: function(response){
                    $('#basket').html(response);
                 },
				 dataType:"json"
          });
   }  
   

function clear_basket() { 
          $.ajax({ type: 'POST', url: 'index.php', data: { metod: 'ajax', PageAjax: 'clear_basket'}, success: function(response){
                    $('#basket').html(response);
                 },
				 dataType:"json"
          });
   }

