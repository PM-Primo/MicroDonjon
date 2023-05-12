const deleteButton = document.getElementById("profile__delete-button")
const deleteBox = document.getElementById("profile__deletebox")
const deleteBoxExit = document.getElementById("profile__deletebox-exit")


    deleteButton.addEventListener("click", openDeleteBox)
    deleteButton.addEventListener("touch", openDeleteBox)
    deleteBox.addEventListener("click", closeDeleteBox)
    deleteBox.addEventListener("touch", closeDeleteBox)
    deleteBoxExit.addEventListener("click", closeDeleteBox)
    deleteBoxExit.addEventListener("touch", closeDeleteBox)

function openDeleteBox(){
    deleteBox.classList.add("profile__deletebox-open")
}

function closeDeleteBox(e){
    
    if(e.target.classList.contains('profile__deletebox-open')) {
        e.target.classList.remove("profile__deletebox-open")    
    }
    else if(e.target.classList.contains('fa-circle-xmark')) {
        const parent = e.target.parentNode.parentNode.parentNode
        parent.classList.remove("profile__deletebox-open")    
    }
    else if(e.target.classList.contains('profile__deletebox-exit')) {
        const parent = e.target.parentNode.parentNode
        deleteBox.classList.remove("profile__deletebox-open")    
    }

}