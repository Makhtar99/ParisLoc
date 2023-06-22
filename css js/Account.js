
// evenment pour les animations sous la nav bar 
document.addEventListener('DOMContentLoaded', function() {
    var elements = document.querySelectorAll('.element');
    var bar = document.querySelector('.bar');
    var activeElement = null;
  
    function setActiveElement(element) {
      if (activeElement) {
        activeElement.classList.remove('active');
      }
      activeElement = element;
      activeElement.classList.add('active');
  
      var elementRect = activeElement.getBoundingClientRect();
      var navBarRect = activeElement.parentNode.parentNode.getBoundingClientRect();
      var offsetLeft = elementRect.left - navBarRect.left;
  
      bar.style.width = elementRect.width + 'px';
      bar.style.transform = 'translateX(' + offsetLeft + 'px)';
    }
  
    function handleClick(event) {
      var clickedElement = event.target;
      if (clickedElement.classList.contains('element')) {
        setActiveElement(clickedElement);
      }
    }
  
    document.addEventListener('click', handleClick);
  });
  
  
  
//   evenement pour faire apparaitre les onglet de la navbar 
        // faire le passage d'une onglet a une autre 
        // HTML
        document.addEventListener('DOMContentLoaded', function() {
          var liste = document.getElementById('nav-bar');
          var div2 = document.getElementById('div2');
          var div3 = document.getElementById('div3');
          var div5 = document.getElementById('div5');
        
          
          liste.addEventListener('click', function(event) {
            var target = event.target;
            
            if (target.textContent === 'Mes réservations') {
              div2.style.display = 'block';
              div3.style.display = 'none';
              div5.style.display = 'none';
            } else if (target.textContent === 'Mes réservations passées') {
              div2.style.display = 'none';
              div3.style.display = 'block';
              div5.style.display = 'none';
            } else if (target.textContent === 'Messagerie') {
              div2.style.display = 'none';
              div3.style.display = 'none';
              div5.style.display = 'block';
            }
          });
        });
        