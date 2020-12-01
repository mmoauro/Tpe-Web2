document.addEventListener("DOMContentLoaded", () => {
    "use strict"

    let app = new Vue({
        el: '#vue-comments',
        data: {
            comments: [],
            status: document.getElementById("userStatus").value
        },
        methods: {
            deleteComment: function (id, index) {
                removeComment(id, index);
            },
            addComment: function (e) {
                e.preventDefault();
                addComment();
            }
        }
    });


    function getComments () {
        let idCelular = document.getElementById("idCelular").value;
        fetch(`api/comentarios/${idCelular}`)
        .then(res => res.json())
        .then(json => app.comments = json)
        .catch(e => console.log(e));
    }

    function addComment () {
        const comment = {
            puntuacion: document.querySelector('#puntuacion').value,
            comentario: document.querySelector('#comment').value,
            id_user: document.querySelector('#idUser').value,
            id_celular: document.querySelector('#idCelular').value
        }
    
        fetch('api/comentarios', {
            method: 'POST',
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(comment)
        })
        .then(response => response.json())
        .then(comment => app.comments.push(comment))
        .catch(error => console.log(error));

        // Me devuelve el nuvo comentario y lo pusheo a los comentarios ^^^^.

        document.querySelector('#comment').value = ""; // Vacio el input del comentario.
    }

    function removeComment (id, index) {
        fetch(`api/comentarios/${id}`,{
            method: 'DELETE'
        })
            .then(() => app.comments.splice(index, 1));
    }

    getComments();
});