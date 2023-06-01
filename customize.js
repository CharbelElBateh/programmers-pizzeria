var valueList = document.getElementById('valueList');
var listArray = [];

var checkboxes = document.querySelectorAll('.checkbox');

for (var checkbox of checkboxes) {
    checkbox.addEventListener('click', function () {
        if (this.checked == true) {
            listArray.push(this.value);
            valueList.innerHTML = listArray.join(' , ');
        } else {
            listArray = listArray.filter(e => e !== this.value);
            valueList.innerHTML = listArray.join(' , ');
        }
    })
}

window.onload = () => {
    for (var checkbox of checkboxes) {
        checkbox.checked = false;
    }
}