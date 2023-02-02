console.log("ok") //Utile pour vérifier que le fichier JS communique bien avec le reste du site

var $collectionHolder

// $addNewItem = $('<a href="#" class="">Ajouter une sortie</a><br><br>');

$(document).ready(function() {

    $collectionHolder = $('#listeSorties');
    $addNewItem = $("#addSortie")

    // append the add new item to the collectionholder
    // $collectionHolder.append($addNewItem);

    $collectionHolder.data('index', $collectionHolder.find('.card').length)


    // add remove button to existing items
    $collectionHolder.find('.card').each(function() {
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
    var $removeButton = $('<a href="#" class="">Suppr.</a>');
    var $cardFooter = $('<div class="card-footer"></div>').append($removeButton);

    // handle click event of remove button
    $removeButton.click(function(e) {
        e.preventDefault();
        $(e.target).parents('.card').slideUp(1000, function() {
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
    
    $collectionHolder.data('index', index++);
    
    // create the card
    var $card = $('<div class="card"></div>');
    $card.append(newForm);
    
    // append the removeButton to new panel
    addRemoveButton($card);
    
    $addNewItem.before($card);
}