document.addEventListener("DOMContentLoaded", function () {
  let brotherhoodContent = document.querySelectorAll('.brotherhood-content');
  let brotherhoodNames = document.querySelectorAll('.brotherhood-group-name');
  let brotherhoodPhotos = document.querySelectorAll('.brotherhood-photo');

  function clickEvent() {
    brotherhoodNames.forEach(item => {
      item.classList.remove('active');
    });
    brotherhoodContent.forEach(item => {
      item.classList.remove('active');
    });
    brotherhoodPhotos.forEach(item => {
      item.classList.remove('active');
    });
    let elements = document.querySelectorAll(`[data-id="${this.id}"]`);

    elements.forEach(element => {
      element.classList.add('active');
    });
    this.classList.add('active');

  }

  brotherhoodNames.forEach(item => {
    item.addEventListener('click', clickEvent);
  });
});