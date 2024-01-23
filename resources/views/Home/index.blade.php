<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="author" content="Bootstrap-ecommerce by Vosidiy">
<title>{{env('APP_NAME')}}</title>
<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/logos/DE-GROSIR.PNG')}}" >
<link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/images/logos/DE-GROSIR.PNG')}}">
<link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/images/logos/DE-GROSIR.PNG')}}">
<!-- jQuery -->
<!-- Bootstrap4 files-->
<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/ui.css" rel="stylesheet" type="text/css"/>
<link href="assets/fonts/fontawesome/css/fontawesome-all.min.css" type="text/css" rel="stylesheet">
<link href="assets/css/OverlayScrollbars.css" type="text/css" rel="stylesheet"/>
<!-- Font awesome 5 -->
<style>
	.avatar {
  vertical-align: middle;
  width: 35px;
  height: 35px;
  border-radius: 50%;
}
.bg-default, .btn-default{
	background-color: #f2f3f8;
}
.btn-error{
	color: #ef5f5f;
}
</style>
<!-- custom style -->
</head>
<body>
<section class="header-main">
	<div class="container">
<div class="row align-items-center">
	<div class="col-lg-3">
	<div class="brand-wrap">
		<img class="logo" src="assets/images/logos/DE-GROSIR.PNG">
		<h2 class="logo-text">{{env('APP_NAME')}}</h2>
	</div> <!-- brand-wrap.// -->
	</div>
	<div class="col-lg-6 col-sm-5">

	</div> <!-- col.// -->
	<div class="col-lg-3 col-sm-7">
		<div class="widgets-wrap d-flex justify-content-end">
			<div class="widget-header">
				<a href="#" class="icontext">
					<a href="#" class="btn btn-primary m-btn m-btn--icon m-btn--icon-only">
															<i class="fa fa-home"></i>
														</a>
                                                        <a href="#" class="btn btn-primary m-btn m-btn--icon m-btn--icon-only">
															<i class="fa fa-book"></i>
														</a>
				</a>
			</div> <!-- widget .// -->
			<div class="widget-header dropdown">
				<a href="#" class="ml-3 icontext" data-toggle="dropdown" data-offset="20,10">
					<img src="assets/images/avatars/bshbsh.png" class="avatar" alt="">
				</a>
				<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="#"><i class="fa fa-sign-out-alt"></i> Logout</a>
				</div> <!--  dropdown-menu .// -->
			</div> <!-- widget  dropdown.// -->
		</div>	<!-- widgets-wrap.// -->
	</div> <!-- col.// -->
</div> <!-- row.// -->
	</div> <!-- container.// -->
</section>
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y-sm bg-default ">
<div class="container-fluid">
<div class="row">
	<div class="col-md-8 card padding-y-sm card ">
		<ul class="nav bg radius nav-pills nav-fill mb-3 bg" role="tablist">
	<li class="nav-item">
		<a class="nav-link active show" data-toggle="pill" href="#nav-tab-card">
		<i class="fa fa-tags"></i> All</a></li>

</ul>
<span   id="items">
<div class="row">


@foreach ($product as $prod)
<div class="col-md-3">
	<figure class="card card-product">
		<span class="badge-new"> NEW </span>
		<div class="img-wrap">
        <img src="{{ asset('storage/' . $prod->img_url) }}">


			<a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
		</div>
		<figcaption class="info-wrap">
			<a href="#" class="title">{{$prod->name}}</a>
			<div class="action-wrap">
				<button class="btn btn-primary btn-sm float-right add-item-button" onclick="addItemToTable('{{$prod->id}}', '{{$prod->name}}', '{{$prod->price}}')"> <i class="fa fa-cart-plus"></i> Add </button>

                <div class="price-wrap h5">
					<span class="price-new">{{$prod->price}}</span>
				</div> <!-- price-wrap.// -->
			</div> <!-- action-wrap -->
		</figcaption>
	</figure> <!-- card // -->
</div> <!-- col // -->
@endforeach




</div> <!-- row.// -->
</span>
	</div>
	<div class="col-md-4">
<div class="card">
	<span id="cart">
<form action="{{ route('store.transaction') }}" method="POST" id="checkoutForm">
@csrf
<table class="table table-hover shopping-cart-wrap" id="item_table">
<thead class="text-muted">
<tr>
  <th scope="col">Item</th>
  <th scope="col" width="120">Qty</th>
  <th scope="col" width="120">Price</th>
  <th scope="col" class="text-right" width="200">Delete</th>
</tr>
</thead>
<tbody>

</tbody>
</table>
  <!-- Add a hidden input field to store product data -->
  <input type="hidden" name="products" id="productsInput">
  <input type="hidden" name="totalAmountInput" id="totalAmountInput" value=0>
</span>
</div> <!-- card.// -->
<div class="box">
<!-- <dl class="dlist-align">
  <dt>Tax: </dt>
  <dd class="text-right">12%</dd>
</dl>
<dl class="dlist-align">
  <dt>Discount:</dt>
  <dd class="text-right"><a href="#">0%</a></dd>
</dl>
<dl class="dlist-align">
  <dt>Sub Total:</dt>
  <dd class="text-right">$215</dd>
</dl> -->
<dl class="dlist-align">
    <dt>Total: </dt>

    <dd id="totalAmount" class="text-right h4 b">0</dd>

</dl>
<div class="row">
	<div class="col-md-6">
    <button type="button" class="btn btn-default btn-error btn-lg btn-block" onclick="cancelTransaction()">
        <i class="fa fa-times-circle"></i> Cancel
      </button>
	</div>
	<div class="col-md-6">
    <button type="button" class="btn btn-primary btn-lg btn-block" onclick="chargeTransaction()">
        <i class="fa fa-shopping-bag"></i> Charge
      </button>
	</div>
</div>
</div> <!-- box.// -->
</form>
	</div>
</div>
</div><!-- container //  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
<script src="assets/js/jquery-2.0.0.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script src="assets/js/OverlayScrollbars.js" type="text/javascript"></script>
<script>
	$(function() {
	//The passed argument has to be at least a empty object or a object with your desired options
	//$("body").overlayScrollbars({ });
	$("#items").height(552);
	$("#items").overlayScrollbars({overflowBehavior : {
		x : "hidden",
		y : "scroll"
	} });
	$("#cart").height(445);
	$("#cart").overlayScrollbars({ });
});// Inisialisasi jumlah total harga

var productsArray = [];
function addItemToTable(id, name, price) {
    // Menonaktifkan tombol "Add" yang diklik

    var button = event.currentTarget;
    button.disabled = true;

    // Cek apakah produk sudah ada di tabel
    var existingRow = findRowById(id);

    if (existingRow) {
        // Jika produk sudah ada, tambahkan kuantitas dan perbarui total harga
        increaseQuantity(existingRow, price);
    } else {
        // Jika produk belum ada, buat elemen baru untuk ditambahkan ke dalam tabel
        var newItemRow = `
            <tr data-id="${id}"  >
                <td>
                    <figure class="media">

                        <figcaption class="media-body">
                            <h6 class="title text-truncate">${name}</h6>
                        </figcaption>
                    </figure>
                </td>
                <td class="text-center">
                    <div class="m-btn-group m-btn-group--pill btn-group mr-2" role="group" aria-label="...">
                        <button type="button" class="m-btn btn btn-default" onclick="decreaseQuantity(this)"><i class="fa fa-minus"></i></button>
                        <button type="button" class="m-btn btn btn-default quantity-btn" disabled>1</button>
                        <button type="button" class="m-btn btn btn-default" onclick="increaseQuantity(this, ${price})"><i class="fa fa-plus"></i></button>
                    </div>
                </td>
                <td>
                <div class="price-wrap">
    <var class="price" data-initial-price="${price}">${price}</var>
</div>
                </td>
                <td class="text-right">
                <button type="button" class="btn btn-outline-danger btn-round" onclick="removeItemFromTableAndEnableButton(this, ${price}, 'add_item_${id}')"> <i class="fa fa-trash"></i></button>
                </td>
            </tr>`;

        // Pilih tabel dengan ID 'item_table'
        var table = document.getElementById('item_table');

        // Tambahkan elemen baru ke dalam tabel
        table.innerHTML += newItemRow;
        updateTotal();
    }

    productsArray.push({
        product_id: id,
        qty: 1, // You may update this based on your logic
        total_price: price
    });

    // Update the hidden input field with the updated productsArray
    updateProductsInput();

}
function updateProductsInput() {
    // Update the hidden input field value with the JSON representation of productsArray
    document.getElementById('productsInput').value = JSON.stringify(productsArray);
}

function increaseQuantity(button, price) {
    // Temukan elemen dengan jumlah item dan harga
    var quantityElement = button.closest('tr').querySelector('.m-btn-group .quantity-btn');
    var priceElement = button.closest('tr').querySelector('.price-wrap var');

    // Ambil jumlah saat ini dan harga awal
    var currentQuantity = parseInt(quantityElement.innerText);

    // Tambahkan jumlah
    quantityElement.innerText = currentQuantity + 1;

    // Perbarui harga dengan menambahkan harga awal dengan harga yang baru
    var newPrice = parseFloat(priceElement.innerText) + price;
    priceElement.innerText = newPrice;

     // Get the product ID
     var productId = button.closest('tr').dataset.id;

// Update the quantity in the products array
updateProductQuantity(productId, currentQuantity + 1);
updateTotal();
}



    function findRowById(id) {
        // Temukan baris yang memiliki data-id sesuai dengan ID produk
        var rows = document.querySelectorAll('#item_table tr[data-id="' + id + '"]');
        return rows.length > 0 ? rows[0] : null;
    }
    function decreaseQuantity(button) {
    // Temukan elemen dengan jumlah item dan harga
    var row = button.closest('tr');
    var quantityElement = row.querySelector('.m-btn-group .quantity-btn');
    var priceElement = row.querySelector('.price-wrap var');

    // Ambil jumlah saat ini dan harga awal
    var currentQuantity = parseInt(quantityElement.innerText);
    var initialPrice = parseFloat(priceElement.dataset.initialPrice);

    // Pastikan tidak kurang dari 1
    if (currentQuantity > 1) {
        // Kurangi jumlah
        quantityElement.innerText = currentQuantity - 1;

        // Perbarui harga dengan mengurangkan harga awal
        var newPrice = initialPrice * (currentQuantity - 1);

        // Menggunakan toFixed untuk memastikan 2 angka di belakang koma
        priceElement.innerText = newPrice % 1 === 0 ? newPrice.toFixed(0) : newPrice.toFixed(2);

        var productId = button.closest('tr').dataset.id;

        // Update the quantity in the products array
        updateProductQuantity(productId, currentQuantity - 1);
        updateTotal();
    }

    if (currentQuantity <= 1) {
        // Set harga kembali ke harga awal
        quantityElement.innerText = 1;
        priceElement.innerText = initialPrice % 1 === 0 ? initialPrice.toFixed(0) : initialPrice.toFixed(2);

        // Panggil fungsi untuk menghapus item dari tabel dan mengaktifkan tombol
        removeItemFromTableAndEnableButton(button);
    }
}

function updateProductQuantity(productId, newQuantity) {
    // Find the product in the array by ID and update its quantity
    var product = productsArray.find(p => p.product_id === productId);
    if (product) {
        product.qty = newQuantity;

        // Update the hidden input field with the updated productsArray
        updateProductsInput();
    }
}







    function removeItemFromTableAndEnableButton(button, price, addButtonId) {
    // Temukan baris yang berisi tombol "Delete" yang diklik
    var row = button.closest('tr');

    // Ambil ID produk dari atribut data-id
    var productId = row.dataset.id;

    // Hapus baris dari tabel
    row.remove();
    // Mengaktifkan (enable) tombol dengan ID 'add_item'
    $('.add-item-button').prop('disabled', false);

    // Aktifkan kembali tombol "Add" dengan menggunakan ID yang sesuai
    var addButton = document.getElementById(addButtonId + '_' + productId);
    if (addButton) {
        addButton.disabled = false;
    }
    var productId = row.dataset.id;
    productsArray = productsArray.filter(product => product.product_id !== productId);

    // Update the hidden input field with the updated productsArray
    updateProductsInput();
    updateTotal();
}
function chargeTransaction() {
    // Validasi jika diperlukan

    // Kirim formulir ke server
    document.getElementById('checkoutForm').submit();
  }

  function cancelTransaction() {
    // Hapus semua item di tabel
    var table = document.getElementById('item_table');
    table.innerHTML = '';
    $('.add-item-button').prop('disabled', false);
    updateTotal()
  }


  document.addEventListener('DOMContentLoaded', function () {
        var successMessage = "{{ session('success') }}"; // Ambil pesan sukses dari session Laravel

        if (successMessage) {
            alert("Message: " + successMessage);
        }
    });

    function updateTotal() {
    // Mengambil semua elemen dengan class 'price' di dalam tabel
    var priceElements = document.querySelectorAll('#item_table .price');

    // Menghitung total dari semua harga
    var totalAmount = Array.from(priceElements).reduce(function (sum, priceElement) {
        return sum + parseFloat(priceElement.innerText);
    }, 0);

    // Mengupdate elemen total dengan hasil perhitungan
    document.getElementById('totalAmount').innerText = 'Rp.' + totalAmount.toFixed(2);
    document.getElementById('totalAmountInput').value = totalAmount.toFixed(2);
}
</script>
</body>
</html>
