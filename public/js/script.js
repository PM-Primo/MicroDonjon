var $collectionHolder

// $addNewItem = $('<a href="#" class="">Ajouter une sortie</a><br><br>');

$(document).ready(function() {

    $collectionHolder = $('#listeSorties');
    $addNewItem = $("#addSortie")

    // append the add new item to the collectionholder
    // $collectionHolder.append($addNewItem);

    $collectionHolder.data('index', $collectionHolder.find('.editor__exit-card').length)


    // add remove button to existing items
    $collectionHolder.find('.editor__exit-card').each(function() {
        addRemoveButton($(this));
    });

    // handle click event addnewItem
    $addNewItem.click(function(e) {
        e.preventDefault();
        // create a new form and append to collectionHolder
        addNewForm();
    })
});

// remove item
function addRemoveButton($card) {
    // create remove button
    var $removeButton = $('<a href="#" class="editor__delete-card-icon"><i class="fa-regular fa-circle-xmark"></i></a>');
    var $cardFooter = $('<div class="editor__delete-card"></div>').append($removeButton);

    // handle click event of remove button
    $removeButton.click(function(e) {
        e.preventDefault();
        $(e.target).parents('.editor__exit-card').slideUp(1000, function() {
            $(this).remove();
        })
    });

    $card.append($cardFooter);
}

function addNewForm() {
    
    // getting the prototype
    var prototype = $collectionHolder.data('prototype');
    // get the index
    var index = $collectionHolder.data('index')
    // create the form
    var newForm = prototype;

    newForm = newForm.replace(/__name__/g, index)
    
    $collectionHolder.data('index', index + 1);
    
    // create the card
    var $card = $('<div class="editor__exit-card"></div>');
    $card.append(newForm);
    
    // append the removeButton to new panel
    addRemoveButton($card);
    
    $addNewItem.before($card);
}


const toggleOpenIcon = document.querySelector("#toggle-open-icon");
const toggleCloseIcon = document.querySelector("#toggle-close-icon");
const leftPage = document.querySelector("#game__left-page");
const rightPage = document.querySelector("#game__right-page");
const itemBoxes = document.getElementsByClassName("game__item-imgbox")

console.log(itemBoxes)

Array.from(itemBoxes).forEach(itemBox => {
    itemBox.addEventListener("click", openDescriptionBox)
});

toggleOpenIcon.addEventListener("click", toggleOpen);
toggleCloseIcon.addEventListener("click", toggleClose);

function toggleOpen(){
    leftPage.classList.add("game__left-page__toggle-open");
}

function toggleClose(){
    leftPage.classList.remove("game__left-page__toggle-open");
}

function openDescriptionBox(e){
    e.stopPropagation();
    const descriptionBoxes = document.getElementsByClassName("game__item-description-box")
    Array.from(descriptionBoxes).forEach(descriptionBox => {
        descriptionBox.classList.remove("game__item-description-box-open")
    })
    const itemId = this.getAttribute("data-item-id")
    const descriptionBox = document.querySelector("#item-description-"+itemId)
    descriptionBox.classList.add("game__item-description-box-open")
    document.addEventListener("click", closeDescriptionBox);
}

function closeDescriptionBox(){
    const descriptionBoxes = document.getElementsByClassName("game__item-description-box")
    Array.from(descriptionBoxes).forEach(descriptionBox => {
        descriptionBox.classList.remove("game__item-description-box-open")
    })
    document.removeEventListener("click", closeDescriptionBox)
}