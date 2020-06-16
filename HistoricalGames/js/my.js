function renderBasket(userId) {
    let str = 'renderBasket=' + userId;
    console.log(userId);

    $.ajax({
        url: '../controllers/Basket.php',
        type: 'POST',
        dataType: 'json',
        data: str,
        error: function (req, text, error) {
            alert(text + ' | ' + error);
        },
        success: function (answer) {
            console.log(answer);
            if (answer == 0) {
                $('.cart-block').html('<h4>Корзина пуста.</h4><div class="totalQ">Количество: 0</div>        <div class="totalP">Стоимость: 0</div><a href="../public/basket.php">Перейти в корзину</a>');
            } else {
                let sum = 0;
                let amount = 0;
                for (let a in answer) {
                    amount += parseInt(answer[a].count);
                    sum += parseInt(answer[a].count * answer[a].price);

                    $('.itemQ' + answer[a].id_product).html(answer[a].count);
                    $('.totalQ').html('Количество: ' + amount);
                    $('.totalP').html('Стоимость: ' + sum + '$');
                    $('.productTotalPrice' + answer[a].id_product).html('Total: ' + answer[a].count * answer[a].price + '$');
                }

            }

        }

    })
}


function buy(id) {
    let str = 'buyGoodInBasketId=' + id;
    $('.buy-btn').val('Товар в корзине');
    $('.buy-btn').attr("disabled", true);
    $.ajax({
        url: '../controllers/Basket.php',
        type: 'POST',
        dataType: 'json',
        data: str,
        error: function (req, text, error) {
            alert(text + ' | ' + error);
        },
        success: function (answer) {
            if (answer) {
                console.log(answer);

                let cartBlock = $('.basket');

                cartBlock.append(`<div class="cart-item cart-item` + answer[4][0] + `">
            <div class="product-bio">
                <img src="../public/img/small/` + answer[4][3] + `" alt="img" width="90px">
                <div class="product-desc">
                    <div class="product-title">` + answer[4][2] + `</div>
                    <div>
                        <div class="product-quantity">Quantity: <input type="button" name="minus" class="minus" value="-" onclick="deleteFromBasket(` + answer[4][0] + `)" data-id="` + answer[4][0] + `"><p class="itemQ` + answer[4][0] + `">` + answer[4][6] + `</p><input type="button" name="plus" class="plus" value="+" onclick="addToBasket(` + answer[4][0] + `)" data-id="` + answer[4][0] + `"></div>
                        <div class="product-single-price">$ ` + answer[4][5] + ` each</div>
                        <div class="productTotalPrice` + answer[4][0] + `">` + answer[4][5] + `</div>
                    </div>
                </div>
            </div>
            <div class="right-block">
                <div class="product-price"></div>
                <input type="button" class="del-btn" name="delete" value="" onclick="deleteGoodBasket(` + answer[4][0] + `)" data-id="` + answer[4][0] + `">
            </div>
        </div>`);
                $('.totalQ').html('Количество: ' + answer[0]);
                $('.totalP').html('Стоимость: ' + answer[1] + '$');
            }

        }
    })

}

function addToBasket(id) {
    let str = 'goodInBasketId=' + id;
    console.log(id);

    $.ajax({
        url: '../controllers/Basket.php',
        type: 'POST',
        dataType: 'json',
        data: str,
        error: function (req, text, error) {
            alert(text + ' | ' + error);
        },
        success: function (answer) {
            if (answer) {
                $('.itemQ' + id).html(answer[3]);
                $('.totalQ').html('Количество: ' + answer[0]);
                $('.totalP').html('Стоимость: ' + answer[1] + '$');
                $('.productTotalPrice' + id).html('Total: ' + answer[2] + '$');
            }

        }
    })
}

function deleteFromBasket(id) {
    let str = 'deleteFromBasket=' + id;
    console.log(id);

    $.ajax({
        url: '../controllers/Basket.php',
        type: 'POST',
        dataType: 'json',
        data: str,
        error: function (req, text, error) {
            alert(text + ' | ' + error);
        },
        success: function (answer) {
            if (answer) {
                //console.log(answer);  
                if (answer[3] > 0) {
                    $('.itemQ' + id).html(answer[3]);
                    $('.totalQ').html('Количество: ' + answer[0]);
                    $('.totalP').html('Стоимость: ' + answer[1] + '$');
                    $('.productTotalPrice' + id).html('Total: ' + answer[2] + '$');
                } else if (answer[1] == null) {
                    $('.cart-block').html('<h4>Корзина пуста.</h4><div class="totalQ">Количество: 0</div>        <div class="totalP">Стоимость: 0</div><a href="../public/basket.php">Перейти в корзину</a>');
                    $('.table-cart').html('<h4>Корзина пуста.</h4>');
                } else {
                    $('.cart-item' + id).remove();
                    $('.productCart' + id).detach();
                    $('.totalQ').html('Количество: ' + answer[0]);
                    $('.totalP').html('Стоимость: ' + answer[1] + '$');
                }

            }

        }
    })
}

function deleteGoodBasket(id) {
    let str = 'deleteGoodBasket=' + id;
    console.log(id);

    $.ajax({
        url: '../controllers/Basket.php',
        type: 'POST',
        dataType: 'json',
        data: str,
        error: function (req, text, error) {
            alert(text + ' | ' + error);
        },
        success: function (answer) {
            if (answer) {
                if (answer[1] == null) {
                    $('.cart-block').html('<h4>Корзина пуста.</h4><div class="totalQ">Количество: 0</div>        <div class="totalP">Стоимость: 0</div><a href="../public/basket.php">Перейти в корзину</a>');
                    $('.table-cart').html('<h4>Корзина пуста.</h4>');
                } else {
                    $('.cart-item' + id).remove();
                    $('.productCart' + id).detach();
                    $('.totalQ').html('Количество: ' + answer[0]);
                    $('.totalP').html('Стоимость: ' + answer[1] + '$');
                }
            }

        }
    })
}

function productRender() {
    let str = 'productRenderId=' + '1';
    $.ajax({
        url: '../controllers/Admin.php',
        type: 'POST',
        dataType: 'json',
        data: str,
        error: function (req, text, error) {
            alert(text + ' | ' + error);
        },
        success: function (answer) {
            console.log(answer);
            let product = '<input type="button" value="Добавить новый товар" onclick="addGood()">'
            product += '<table><tr><th>№</th><th>Id</th><th>Title</th><th>Price</th><th>Img</th><th>Short info</th><th>Full info</th><th>Genre</th><th></th><th></th>';
            let i = 1;
            for (let good in answer) {
                product += '<tr style="border: 1px solid;">';
                product += '<td style="border: 1px solid;">' + (i++) + '</td>';
                product += '<td style="border: 1px solid;">' + answer[good].id + '</td>';
                product += '<td style="border: 1px solid;">' + answer[good].title + '</td>';
                product += '<td style="border: 1px solid;">' + answer[good].price + '</td>';
                product += '<td style="border: 1px solid;">' + answer[good].img + '</td>';
                product += '<td style="border: 1px solid;">' + answer[good].short_info + '</td>';
                product += '<td style="border: 1px solid;">' + answer[good].full_info + '</td>';
                product += '<td style="border: 1px solid;">' + answer[good].genre + '</td>';
                product += '<td style="border: 1px solid;"><input type="button" value="Изменить" onclick="change(' + answer[good].id + ')"></td>';
                product += '<td style="border: 1px solid;"><input type="button" value="Удалить" onclick="productDel(' + answer[good].id + ')"></td>';
                product += '</tr>';
            }
            product += '</table>';
            $('.field').empty();
            $('.field').append(product);
        }
    });
}

//function updateProduct(id) {
//    let str = 'changeId=' + id;
//    console.log(str);
//    $.ajax({
//        url: '../controllers/Admin.php',
//        type: 'POST',
//        dataType: 'json',
//        data: str,
//        error: function (req, text, error) {
//            alert(text + ' | ' + error);
//        },
//        success: function (answer) {
//            console.log(answer);
//            
//        }
//    })
//}

function change(id) {
    let str = 'changeId=' + id;
    console.log(id);
    $.ajax({
        url: '../controllers/Admin.php',
        type: 'POST',
        dataType: 'json',
        data: str,
        error: function (req, text, error) {
            alert(text + ' | ' + error);
        },
        success: function (answer) {
            console.log(answer);
            let product = '<form method="post" class="productForm">';
            product+='<p>Id</p><input type="text" name="id" value="' + answer.id + ' ">';
            product+='<p>Title</p><textarea name="title" cols="50" rows="1">' + answer.title + '</textarea>';
            product+='<p>Price</p><input type="text" name="price" value="' + answer.price + '">';
            product+='<p>Img</p><textarea name="img" cols="10" rows="1">' + answer.img + '</textarea>';
            product+='<p>Short info</p><textarea name="shortInfo" cols="50" rows="10">' + answer.short_info + '</textarea>';
            product+='<p>Full info</p><textarea name="fullInfo"  cols="50" rows="10">' + answer.full_info + '</textarea>';
            product+='<p>Genre</p><textarea name="genre" cols="5" rows="1">' + answer.genre + '</textarea>';
            product+='<input type="submit" name="updateId" value="Обновить" ></form>';
            product+='<input type="button" value="Удалить" onclick="productDel(' + answer.id + ')">';
            product+= '<input type="button" value="Вернуться" onclick="productRender()">';
            $('.field').empty();
            $('.field').append(product);
            
        }

    });
}

$('.productForm').submit(
function(){
    console.log('Yes');
    $.ajax({
        url: '../controllers/Admin.php',
        type: 'POST',
        dataType: 'json',
        data: $('.productForm').serialize(),
        error: function (req, text, error) {
            alert(text + ' | ' + error);
        },
        success: function (answer) {
            //$(location).attr('href','admin.php?productRenderId=1');
            
        }
    })
}
);

function productDel(id) {
    let str = 'removeGood=' + id;
    console.log(str);
    $.ajax({
        url: '../controllers/Admin.php',
        type: 'POST',
        dataType: 'json',
        data: str,
        error: function (req, text, error) {
            alert(text + ' | ' + error);
        },
        success: function (answer) {
            console.log(answer);
            
        }
    })
}

function addGood(){
    let str = 'newGood';
    $.ajax({
        url: '../controllers/Admin.php',
        type: 'POST',
        data: str,
        error: function (req, text, error) {
            alert(text + ' | ' + error);
        },
        success: function (answer) {
            let product = '<form method="post" class="addGoodForm"';
            product+='<p>Title</p><textarea name="title" cols="50" rows="1"></textarea>';
            product+='<p>Price</p><input type="text" name="price">';
            product+='<p>Img</p><textarea name="img" cols="10" rows="1"></textarea>';
            product+='<p>Short info</p><textarea name="shortInfo" cols="50" rows="10"></textarea>';
            product+='<p>Full info</p><textarea name="fullInfo"  cols="50" rows="10"></textarea>';
            product+='<p>Genre</p><textarea name="genre" cols="5" rows="1"></textarea>';
            product+='<input type="submit" name="addNewGood" value="Добавить" ></form>';
            product+= '<input type="button" value="Вернуться" onclick="productRender()">';
            product+='</form>';
            $('.field').empty();
            $('.field').append(product);
            
        }
    })
}
$('.addGoodForm').submit(
function(){
    console.log('Yes');
    $.ajax({
        url: '../controllers/Admin.php',
        type: 'POST',
        dataType: 'json',
        data: $('.addGoodForm').serialize(),
        error: function (req, text, error) {
            alert(text + ' | ' + error);
        },
        success: function (answer) {
            //$(location).attr('href','admin.php?productRenderId=1');
            
        }
    })
}
);


function usersRender() {
    let str = 'usersRenderId=' + '1';
    $.ajax({
        url: '../controllers/Admin.php',
        type: 'POST',
        dataType: 'json',
        data: str,
        error: function (req, text, error) {
            alert(text + ' | ' + error);
        },
        success: function (answer) {
            console.log(answer);
            let product = '<input type="button" value="Добавить нового пользователя" onclick="addUser()">'
            product += '<table><tr><th>№</th><th>Id</th><th>Login</th><th>Name</th><th>Email</th><th>Pass</th><th>Rights</th><th></th><th></th>';
            let i = 1;
            for (let user in answer) {
                product += '<tr style="border: 1px solid;">';
                product += '<td style="border: 1px solid;">' + (i++) + '</td>';
                product += '<td style="border: 1px solid;">' + answer[user].id + '</td>';
                product += '<td style="border: 1px solid;">' + answer[user].login + '</td>';
                product += '<td style="border: 1px solid;">' + answer[user].name + '</td>';
                product += '<td style="border: 1px solid;">' + answer[user].email + '</td>';
                product += '<td style="border: 1px solid;">' + answer[user].pass + '</td>';
                product += '<td style="border: 1px solid;">' + answer[user].rights + '</td>';
                product += '<td style="border: 1px solid;"><input type="button" value="Изменить" onclick="changeUser(' + answer[user].id + ')"></td>';
                product += '<td style="border: 1px solid;"><input type="button" value="Удалить" onclick="userDel(' + answer[user].id + ')"></td>';
                product += '</tr>';
            }
            product += '</table>';
            $('.field').empty();
            $('.field').append(product);
        }
    });
}

function changeUser(id) {
    let str = 'changeUserId=' + id;
    console.log(id);
    $.ajax({
        url: '../controllers/Admin.php',
        type: 'POST',
        dataType: 'json',
        data: str,
        error: function (req, text, error) {
            alert(text + ' | ' + error);
        },
        success: function (answer) {
            console.log(answer);
            let product = '<form method="post" class="userForm">';
            product+='<p>Id</p><input type="text" name="id" value="' + answer.id + ' ">';
            product+='<p>Login</p><textarea name="login" cols="50" rows="1">' + answer.login + '</textarea>';
            product+='<p>Name</p><input type="text" name="name" value="' + answer.name + '">';
            product+='<p>Email</p><textarea name="email" cols="10" rows="1">' + answer.email + '</textarea>';
            product+='<p>Pass</p><textarea name="pass" cols="50" rows="10">' + answer.pass + '</textarea>';
            product+='<p>Rights</p><textarea name="rights"  cols="50" rows="10">' + answer.rights + '</textarea>';
            product+='<input type="submit" name="updateUserId" value="Обновить" ></form>';
            product+='<input type="button" value="Удалить" onclick="userDel(' + answer.id + ')">';
            product+= '<input type="button" value="Вернуться" onclick="usersRender()">';
            product+='</form>';
            $('.field').empty();
            $('.field').append(product);
            
        }

    });
}

$('.userForm').submit(
function(){
    console.log('Yes');
    $.ajax({
        url: '../controllers/Admin.php',
        type: 'POST',
        dataType: 'json',
        data: $('.userForm').serialize(),
        error: function (req, text, error) {
            alert(text + ' | ' + error);
        },
        success: function (answer) {
            //$(location).attr('href','admin.php?productRenderId=1');
            
        }
    })
}
);

function userDel(id) {
    let str = 'removeUser=' + id;
    console.log(str);
    $.ajax({
        url: '../controllers/Admin.php',
        type: 'POST',
        dataType: 'json',
        data: str,
        error: function (req, text, error) {
            alert(text + ' | ' + error);
        },
        success: function (answer) {
            console.log(answer);
            
        }
    })
}

function addUser(){
    let str = 'newUser';
    $.ajax({
        url: '../controllers/Admin.php',
        type: 'POST',
        data: str,
        error: function (req, text, error) {
            alert(text + ' | ' + error);
        },
        success: function (answer) {
            let product = '<form method="post" class="addUserForm"';
            product+='<p>Login</p><textarea name="login" cols="50" rows="1"></textarea>';
            product+='<p>Name</p><input type="text" name="name" value="">';
            product+='<p>Email</p><input type="email" name="email">';
            product+='<p>Pass</p><textarea name="pass" cols="50" rows="10"></textarea>';
            product+='<p>Rights</p><textarea name="rights"  cols="50" rows="10"></textarea>';
            product+='<input type="submit" name="addNewUser" value="Добавить" ></form>';
            product+= '<input type="button" value="Вернуться" onclick="usersRender()">';
            product+='</form>';
            $('.field').empty();
            $('.field').append(product);
            
        }
    })
}

$('.addUserForm').submit(
function(){
    console.log('Yes');
    $.ajax({
        url: '../controllers/Admin.php',
        type: 'POST',
        dataType: 'json',
        data: $('.addUserForm').serialize(),
        error: function (req, text, error) {
            alert(text + ' | ' + error);
        },
        success: function (answer) {
            //$(location).attr('href','admin.php?productRenderId=1');
            
        }
    })
}
);