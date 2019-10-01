
//Back to top function
var amountScrolled = 150;

$(window).scroll(function () {
    if ($(window).scrollTop() > amountScrolled) {
        $('a.back-to-top').fadeIn('slow');
    } else {
        $('a.back-to-top').fadeOut('slow');
    }
});

$('a.back-to-top').click(function () {
    $('html, body').animate({
        scrollTop: 0
    }, 700);
    return false;
});

//Slide show for tours
var imageCount = 1;
var total = 5;

function slideShow(img) {
    var image = document.getElementById('mainImg');
    imageCount = imageCount + img;
    if (imageCount > total) {
        imageCount = 1;
    }
    if (imageCount < 1) {
        imageCount = total;
    }
    image.src = "media/slideShow" + imageCount + ".jpg";
}
//contant
function checkContact() {
    var fname = document.getElementById("fname").value;
    for (var i = 0; i < fname.length; i++)
    {
        if (!isNaN(fname.charAt(i)) && !(fname.charAt(i) == " "))
        {
            document.getElementById("fname").value = "";
            alert('נא הזן שנית את שמך הפרטי ללא מספרים');
            {
                break;
            }
        }
        textFname = fname.charAt(i);
    }
}


function checkFildes() {
    var fname = document.getElementById("First_Name").value;
    var i;
    for (i = 0; i < fname.length; i++)
    {
        if (!isNaN(fname.charAt(i)) && !(fname.charAt(i) == " "))//The isNaN() function returns true if the value is NaN (Not-a-Number),
        {
            document.getElementById("First_Name").value = "";
            alert('נא הזן שנית את שמך הפרטי ללא מספרים');
            {
                break;
            }
        }
        textFname = fname.charAt(i);
    }

    var lname = document.getElementById("last_Name").value;
    var j;
    for (j = 0; j < lname.length; j++)
    {
        if (!isNaN(lname.charAt(j)) && !(lname.charAt(j) == " "))
        {
            document.getElementById("last_Name").value = "";
            alert('נא הזן שנית את שם המשפחה  ללא מספרים');
            {
                break;
            }
        }
        textLname = lname.charAt(j);
    }

    var AddressCity = document.getElementById("AddressCity").value;
    var t;
    for (t = 0; t < AddressCity.length; t++)
    {
        if (!isNaN(AddressCity.charAt(t)) && !(AddressCity.charAt(t) == " "))
        {
            document.getElementById("AddressCity").value = "";
            alert('נא הזן שנית את שם העיר ללא מספרים');
            {
                break;
            }
        }
        textAddressCity = AddressCity.charAt(t);
    }

    var AddressStreet = document.getElementById("AddressStreet").value;
    for (var w = 0; w < AddressStreet.length; w++) {
        if (!isNaN(AddressStreet.charAt(w)) && !(AddressStreet.charAt(w) == " ")) {
            document.getElementById("AddressStreet").value = "";
            alert('נא הזן שנית את כתובתך ללא מספרים');
            break;
        }
        textAddressStreet = AddressStreet.charAt(w);
    }
}





//Open menu in home page
$(document).ready(function () {
    var openMenuWidth = $(".open_menu_container").width();
    $(".open_menu_container").mouseenter(function () {
        $(this).animate({width: "123%"});
        $(this).children(".open_me").fadeIn(400);
    }).mouseleave(function () {
        $(this).animate({width: openMenuWidth});
        $(this).children(".open_me").fadeOut(400);
    });
});

//Log in drop down
$(document).ready(function () {
    $('.active-links').click(function () {
//Conditional states allow the dropdown box appear and disappear 
        if ($('#signin-dropdown').is(":visible")) {
            $('#signin-dropdown').hide();
            $('#signin-link').removeClass('active'); // When the dropdown is not visible removes the class "active"
            $('#enter_pos').css({"background-color": "transparent", "color": "white", "border-top": "none", "border-bottom": "none"});
            $('#enter_pos').hover(function () {
                $(this).css({"background-color": "transparent", "color": "white", "border-top": "2px solid orange", "border-bottom": "2px solid orange"});
            }, function () {
                $(this).css({"background-color": "transparent", "color": "white", "border-top": "none", "border-bottom": "none"});
            });
        } else {
            $('#signin-dropdown').show();
            $('#signin-link').addClass('active'); // When the dropdown is visible add class "active"
            $('#enter_pos').css({"background-color": "transparent", "color": "#33ff00", "border-top": "2px solid orange", "border-bottom": "2px solid orange"});
            $('#enter_pos').hover(function () {
                $(this).css({"background-color": "transparent", "color": "#33ff00", "border-top": "2px solid orange", "border-bottom": "2px solid orange"});
            });
        }
        return false;
    });
    $('#signin-dropdown').click(function (e) {
        e.stopPropagation();
    });
    $(document).click(function () {
        $('#signin-dropdown').hide();
        $('#enter_pos').removeClass('active');
        $('#enter_pos').css({"background-color": "transparent", "color": "white", "border-top": "none", "border-bottom": "none"});
        $('#enter_pos').hover(function () {
            $(this).css({"background-color": "transparent", "color": "white", "border-top": "2px solid orange", "border-bottom": "2px solid orange"});
        }, function () {
            $(this).css({"background-color": "transparent", "color": "white", "border-top": "none", "border-bottom": "none"});
        });
    });

});

//Click to order tour
function orderWindowDisappear() {
    loc = "tour.php";
    window.location.href = loc;
}

//Add products to shopping cart
var totalPrice = 0;

function addItem(productName, amount, price) {

    if (amount == 0)
        return;
    var Protable = document.getElementById("shopCart");
    var row = Protable.insertRow(1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    cell1.innerHTML = productName;
    cell2.innerHTML = amount;
    var totalAmount = price * amount;
    cell3.innerHTML = totalAmount;
    addPrice(totalAmount);
    var cell4 = row.insertCell(3);
    var link = document.createElement('a');
    var href = "#";
    link.href = href;
    var onclick = function () {
        var i = this.parentNode.parentNode.rowIndex;
        document.getElementById("shopCart").deleteRow(i);
        subPrice(totalAmount);
    };
    link.onclick = onclick;
    link.innerHTML = "הסר";
    cell4.appendChild(link);
}
function addPrice(totalAmount) {
    totalPrice = totalPrice + totalAmount;
    var currentPrice = document.getElementById("totalPrice");
    if (totalPrice > 0) {
        currentPrice.innerHTML = totalPrice;
        currentPrice.removeAttribute("class", "current_price");
    } else {
        currentPrice.setAttribute("class", "current_price");
    }
}
function subPrice(totalAmount) {
    totalPrice = totalPrice - totalAmount;
    var currentPrice = document.getElementById("totalPrice");
    if (totalPrice > 0) {
        currentPrice.innerHTML = totalPrice;
    } else {
        currentPrice.setAttribute("class", "current_price");
    }
}
//פונקציה שלא רלוונטית לחלק צד שרת   
function arrayProductName(i) {
    var productName = ['חבילה מפנקת 1', 'חבילה מפנקת ', 'החבילה הכתומה', 'מיצי העונה', 'ריבת לימונים', 'ריבת אשכוליות', 'ריבת קלמנטינות', 'מארז ריבות מפנק', 'ריבת תפוז סיני'];
    return productName[i];
}
//פונקציה שלא רלוונטית לחלק צד שרת   
function arrayProductPrice(m) {
    var productPrice = [99, 81, 101, 13, 22, 21, 24, 101, 19];
    return productPrice[m];
}


//Check if first mail and sec mal match
function matchEmailValidation() {
    var firstMail = document.getElementById("first_mail").value;
    var secMail = document.getElementById("sec_mail").value;
    if (firstMail === secMail) {
        end;
    } else {
        document.getElementById("first_mail").value = "";
        document.getElementById("sec_mail").value = "";
        alert("אימייל לא תואם, נא הזן שנית את האימייל");
        return false;
    }
}

//Change big picture
function changeImg(event) {
    event = event || window.event;
    var targetE = event.target || event.srcElement;
    if (targetE.tagName === "IMG") {
        document.getElementById("big_pic").src = targetE.getAttribute("src");
    }
}
//Dynamically change CSS of link based on current page

//check date for credit card for payment page
function checkDate() {
    var d = new Date();
    var yearNow = d.getFullYear();
    var monthNow = d.getMonth();
    var year1 = document.getElementById("exYear").value;
    var month1 = document.getElementById("exMonth").value;
    if (year1 = yearNow) {
        if (month1 < monthNow) {
            var a = year1.createAttribute("value");
            a.value = "";
            alert('אינך יכול להכניס תאריך שפג תוקפו');
        }
    }
    return false;
}
function minimumtoday() {

    var d = new Date();
    var day = d.getDate();
    var month = d.getMonth() + 1;
    if (month < 10) {
        month = "0" + month;
    }
    if (day < 10) {
        day = "0" + day;
    }
    var year = d.getFullYear();
    var orderdiv = document.getElementById("Tdate");
    var typ = document.createAttribute("min");
    var fulldate = year + "-" + month + "-" + day;
    typ.value = fulldate;
    orderdiv.attributes.setNamedItem(typ);
}
//change remove value to remove order from database
function changeValue(id) {
    document.getElementById(id).value = id;
}
function yearExpire() {
    var x = document.getElementById("exYear");
    var d = new Date();
    var year = d.getFullYear();
    for (i = 0; i < 9; i++) {
        var option = document.createElement("option");
        option.text = year + i;
        option.value = year + i;
        x.add(option);
    }
}

function monthExpire() {
    var y = document.getElementById("exYear").value;
    var x = document.getElementById("exMonth");
    while (x.length > 1) {
        x.remove(x.length - 1);
    }
    var d = new Date();
    var year = d.getFullYear();
    var month = d.getMonth() + 1;
    if (y != year) {
        month = 1;
    }
    for (i = month; i < 13; i++) {
        var option = document.createElement("option");
        option.text = i;
        option.value = i;
        x.add(option);
    }
}
