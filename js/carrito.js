let clickButton = document.querySelectorAll('.button')
let tbody = document.querySelector('.tbody')
let amountProduct = document.querySelector('.count-product');
let itemCartTotal = document.querySelector('.itemCartTotal');


let carrito = []
let countProduct = 0;

clickButton.forEach(btn => {
  btn.addEventListener('click', addToCarritoItem)
})


function addToCarritoItem(e) {
  const button = e.target
  const item = button.closest('.card')
  const articulo = item.querySelector('.button').getAttribute('data-id');
  const itemTitle = item.querySelector('.card-title').textContent;
  const itemPrice = item.querySelector('.precio').textContent;
  const itemImg = item.querySelector('.card-img-top').src;


  const newItem = {
    id: articulo,
    title: itemTitle,
    precio: itemPrice,
    img: itemImg,
    cantidad: 1

  }

  addItemCarrito(newItem)
}


function addItemCarrito(newItem) {

  /*   const alert = document.querySelector('.alert')
  
    setTimeout(function () {
      alert.classList.add('hide')
    }, 2000)
    alert.classList.remove('hide') */

  const InputElemnto = tbody.getElementsByClassName('input__elemento')
  for (let i = 0; i < carrito.length; i++) {
    if (carrito[i].title.trim() === newItem.title.trim()) {
      carrito[i].cantidad++;
      const inputValue = InputElemnto[i]
      inputValue.value++;
      CarritoTotal()
      return null;
    }
  }

  carrito.push(newItem)
  countProduct++;
  amountProduct.innerHTML = countProduct;
  renderCarrito()
  
}


function renderCarrito() {
  tbody.innerHTML = ''
  carrito.map(item => {
    const tr = document.createElement('tr')
    tr.classList.add('ItemCarrito')
    const Content = `
    
    <th scope="row">${item.id}</th>
            <td class="table__productos">
              <img src=${item.img}  alt="">
              <h5 class="title">${item.title}</h5>
            </td>
            <td class="table__price"><p>${item.precio}</p></td>
            <td class="table__cantidad">
              <input type="number" min="1" value=${item.cantidad} class="input__elemento">
              <button class="delete btn btn-danger">x</button>
            </td>
    
    `
    tr.innerHTML = Content;
    tbody.append(tr)

    tr.querySelector(".delete").addEventListener('click', removeItemCarrito)
    tr.querySelector(".input__elemento").addEventListener('change', sumaCantidad)
  })

  CarritoTotal()
  emptyCart()
}

function formatearNumero(number) {
  return new Intl.NumberFormat("es-CL").format(number);
}

function CarritoTotal() {
  let Total = 0;
  const itemCartTotal = document.querySelector('.itemCartTotal')
  carrito.forEach((item) => {
    const precio = Number(item.precio)
    Total = Total + precio * item.cantidad


  })

  itemCartTotal.innerHTML = `Total $${formatearNumero(Total.toFixed(0))}`
  addLocalStorage()
}

function removeItemCarrito(e) {
  const buttonDelete = e.target
  const tr = buttonDelete.closest(".ItemCarrito")
  const title = tr.querySelector('.title').textContent;
  for (let i = 0; i < carrito.length; i++) {

    if (carrito[i].title.trim() === title.trim()) {
      carrito.splice(i, 1)
    }
  }

  /*  const alert = document.querySelector('.remove')
 
   setTimeout(function () {
     alert.classList.add('remove')
   }, 2000)
   alert.classList.remove('remove') */

  tr.remove()
  countProduct--;
  amountProduct.innerHTML = countProduct;
  CarritoTotal()
  emptyCart()
}

function sumaCantidad(e) {
  const sumaInput = e.target
  const tr = sumaInput.closest(".ItemCarrito")
  const title = tr.querySelector('.title').textContent;
  carrito.forEach(item => {
    if (item.title.trim() === title) {
      sumaInput.value < 1 ? (sumaInput.value = 1) : sumaInput.value;
      item.cantidad = sumaInput.value;
      CarritoTotal()
    }
  })
}

function addLocalStorage() {
  localStorage.setItem('carrito', JSON.stringify(carrito))
  localStorage.setItem('count-product', countProduct)

}

window.onload = function () {

  const storage = JSON.parse(localStorage.getItem('carrito'));
  const storage2 = localStorage.getItem('count-product');
  if (storage) {
    carrito = storage;
    countProduct = storage2;
    amountProduct.innerHTML = countProduct;
    renderCarrito()
    
  }

}


function comprar() {


  carrito = []
  localStorage.setItem('carrito', JSON.stringify(carrito))
  tbody.innerHTML = ''

  countProduct = 0;
  localStorage.setItem('count-product', countProduct)
  amountProduct.innerHTML = 0;

  Total = 0;
  itemCartTotal.innerHTML = `Total $${formatearNumero(Total.toFixed(3))}`


  Swal.fire({
    position: "center",
    icon: "success",
    title: "Gracias por su compra",
    showConfirmButton: false,
    timer: 2000
  });

emptyCart()
  //setInterval(function () { location.reload(); }, 2100);
  window.scroll(0, 0);

}

function emptyCart() {
  if (carrito.length === 0) {
    document.querySelector('.carrito-vacio').classList.add('hidden');
    document.querySelector('.carrito-productos').classList.remove('hidden');
    console.log("carrito vacio")
  } else if (carrito.length > 0) {
    console.log("Carrito con productos")
    document.querySelector('.carrito-vacio').classList.remove('hidden');
    document.querySelector('.carrito-productos').classList.add('hidden');
  

  } 
}


