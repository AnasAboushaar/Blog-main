/**
 * delete the article via boostrap modal
 */

const btnDelete = document.querySelectorAll(".btnDelete");

btnDelete.forEach(btn => {
  btn.addEventListener('click',(event) => {
    
      event.preventDefault();

      const modal = new boostrap.Modal(document.querySelector("#confirmDelete"))
        
      
      modal.show()
    });
});