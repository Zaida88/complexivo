function handleDragStart(e) {
    this.style.opacity = '0.4';
}

function handleDragEnd(e) {
    this.style.opacity = '1';
}

let items = document.querySelectorAll('.container .box');
items.forEach(function (item) {
    item.addEventListener('dragstart', handleDragStart);
    item.addEventListener('dragend', handleDragEnd);
});

document.addEventListener('DOMContentLoaded', (event) => {

    function handleDragStart(e) {
        this.style.opacity = '0.4';
    }

    function handleDragEnd(e) {
        this.style.opacity = '1';

        items.forEach(function (item) {
            item.classList.remove('over');
        });
    }

    function handleDragOver(e) {
        if (e.preventDefault) {
            e.preventDefault();
        }

        return false;
    }

    function handleDragEnter(e) {
        this.classList.add('over');
    }

    function handleDragLeave(e) {
        this.classList.remove('over');
    }

    let items = document.querySelectorAll('.container .box');
    items.forEach(function (item) {
        item.addEventListener('dragstart', handleDragStart);
        item.addEventListener('dragover', handleDragOver);
        item.addEventListener('dragenter', handleDragEnter);
        item.addEventListener('dragleave', handleDragLeave);
        item.addEventListener('dragend', handleDragEnd);
        item.addEventListener('drop', handleDrop);
    });
});

function handleDrop(e) {
    e.stopPropagation(); 
    return false;
}
function handleDragStart(e) {
    this.style.opacity = '0.4';

    dragSrcEl = this;

    e.dataTransfer.effectAllowed = 'move';
    e.dataTransfer.setData('text/html', this.innerHTML);
}
function handleDrop(e) {
    e.stopPropagation();

    if (dragSrcEl !== this) {
        dragSrcEl.innerHTML = this.innerHTML;
        this.innerHTML = e.dataTransfer.getData('text/html');
    }

    return false;
}

function check() {
    var x = document.getElementsByTagName("input").length;
    var show;
    for (i = 0; i < x; i++) {
        show += " " + document.getElementsByTagName("input")[i].value;
    }
    show = show.substring(10);
    var stringAsArray = show.split(" ");
    var stringAsArray2 = show.split(" ");
    stringAsArray.sort();
    var result = (compareArrays(stringAsArray, stringAsArray2));
    if (result) {
        $('#modalCorrect').modal('show');
    } else {
        $('#incorrectModal').modal('show');
    }
    function compareArrays(array1, array2) {
        var i, isA1, isA2;
        isA1 = Array.isArray(array1);
        isA2 = Array.isArray(array2);

        if (isA1 !== isA2) {
            return false;
        }
        if (!(isA1 && isA2)) {
            return array1 === array2;
        }
        if (array1.length !== array2.length) {
            return false;
        }
        for (i = 0; i < array1.length; i += 1) {
            if (!compareArrays(array1[i], array2[i])) {
                return false;
            }
        }
        return true;
    }
}

$(".go").on("click", "button.back", function () {
    var idLanguages = $("#idLanguages").val();
    window.location = "index.php?route=list-exercises&idLanguage=" + idLanguages;
})