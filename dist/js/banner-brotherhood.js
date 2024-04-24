let brotherhoodContent = document.querySelectorAll('.brotherhood-content');
let brotherhoodNames = document.querySelectorAll('.brotherhood-group-name');

function clickEvent() {
  brotherhoodNames.forEach(item => {
      item.classList.remove('active');
    });
    brotherhoodContent.forEach(item => {
        item.classList.remove('active');
      });
    document.getElementById(this.dataset.id).classList.add('active');;
    this.classList.add('active');
}

brotherhoodNames.forEach(item => {
    item.addEventListener('click', clickEvent);
  });