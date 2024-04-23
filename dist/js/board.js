let boardGroups = document.querySelectorAll('.board-group');
let boardNames = document.querySelectorAll('.board-group-name');

console.log(boardGroups)
console.log(boardNames)


function clickEvent() {
    boardNames.forEach(item => {
      item.classList.remove('active');
    });
    boardGroups.forEach(item => {
        item.classList.remove('active');
      });
    document.getElementById(this.dataset.id).classList.add('active');;
    this.classList.add('active');
}

boardNames.forEach(item => {
    item.addEventListener('click', clickEvent);
  });