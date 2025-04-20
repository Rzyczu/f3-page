document.addEventListener("DOMContentLoaded", function () {

  let scoutPathContent = document.querySelectorAll('.scout-path-content');
  let scoutPathElements = document.querySelectorAll('.scout-path-element');

  scoutPathElements[0].classList.add('active');

  function clickEvent() {
    scoutPathElements.forEach(item => {
      item.classList.remove('active');
    });
    scoutPathContent.forEach(item => {
      item.classList.remove('active');
    });

    let element = document.querySelector(`[data-id="${this.id}"]`);
    element.classList.add('active');
    this.classList.add('active');
  }

  scoutPathElements.forEach(item => {
    item.addEventListener('click', clickEvent);
  });
});