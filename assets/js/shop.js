let items = [];

function sync() {
    if (sessionStorage.getItem('bag') !== null) {
        items = JSON.parse(sessionStorage.getItem('bag'));
        update();
    }
}

function update() {
    const counter = document.getElementById('bagCounter');
    const value = document.getElementById('bagValue');

    let totalValue = 0;
    for (let i = 0; i < items.length; i++) {
        totalValue += items[i].price * items[i].quantity;
    }
    value.innerHTML = `${String(totalValue.toFixed(2)).replace('.', ',')} €`;

    if (counter !== null)counter.innerHTML = items.length;

    sessionStorage.setItem('bag', JSON.stringify(items));
}

/**
 * Add a new product to the list.
 * @param {string} product 
 * @param {number} price 
 */
function addProduct(product, price) {
    let quantity = 1;

    for (let i = 0; i < items.length; i++) {
        const item = items[i];
        if (item.product == product) {
            item.quantity += 1;
            console.debug(`Increment quan to ${item.quantity}`);

            update();

            return;
        }
    }

    items.push({
        product,
        price,
        quantity
    });

    update();
}

/**
 * This removes an item from your bag and rebuild the bag listing.
 * @param {string} name Of item to remove.
 */
function deleteItem(name) {
    items.forEach((value, index) => {
        if (value === undefined) return;
        if (value.product === name) {
            items.splice(index, 1);
        }
    });
    update();
    buildBag();
}

function buildBag() {
    const bagList = document.getElementById('bagList');
    const bagContent = document.getElementById('bagContent');

    // If bag is empty
    if (items.length === 0) {
        const cartForm = document.getElementById('cart');
        const cartEmptyText = document.getElementById('cart_empty');

        // We're currently not on the checkout page.
        if (cartForm !== undefined && cartEmptyText !== undefined) {
            cartForm.style = 'display: none';
            cartEmptyText.style = '';
        }

        return;
    }

    // Clear bag
    bagList.innerHTML = '';

    for (let i = 0; i < items.length; i++) {
        const item = document.createElement('li');
        const productImg = document.createElement('img');

        /* Build action menu */
        const actions = document.createElement('div');
        actions.className = "bagActions";

        const actionDelete = document.createElement('span');
        actionDelete.className = "icon solid major fa-trash-alt";
        actions.onclick = function (event) {
            deleteItem(items[i].product);
        };
        actions.appendChild(actionDelete);

        productImg.src = `assets/img/${items[i].product}.jpg`

        item.classList = "bagItem xyz-in";
        item.innerHTML = `<p>${items[i].quantity}x ${items[i].product}<p>`;
        item.appendChild(productImg);
        item.appendChild(actions);

        bagList.appendChild(item);
    }

    bagContent.setAttribute('value', JSON.stringify(items));
}

sync();
buildBag();
