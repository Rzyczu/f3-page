let scoutPathContent = document.querySelectorAll('.scout-path-content');
let scoutPathElements = document.querySelectorAll('.scout-path-elements');

function clickEvent() {
  scoutPathElements.forEach(item => {
      item.classList.remove('active');
    });
    scoutPathContent.forEach(item => {
      item.classList.remove('active');
    });

    let elements = document.querySelector(`[data-id="${this.id}"]`);
    console.log(this);
    elements.forEach(element => {
      element.classList.add('active');
    });
    this.classList.add('active');
}

scoutPathElements.forEach(item => {
    item.addEventListener('click', clickEvent);
  });