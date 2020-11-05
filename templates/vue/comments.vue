{literal}
<div id="vue-comments">
    <h3>Comentarios</h3>
    <div v-if="status >= 0">

        <form v-on:submit="addComment">
            <label>Puntuacion</label>
            <select required id="puntuacion">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <input type="text" id="comment" placeholder="Agregar un comentario" required>
            <button class="btn btn-primary" >Comentar</button>
        </form>

    </div>
    <ul>
        <li v-for="(comment, index) in comments" class="list-group-item"> 
            {{comment.email}}:  <i class="fas fa-star"></i>{{ comment.puntuacion }} - {{ comment.comentario}}
            <button v-if="status == 1" :value="comment.id" v-on:click="deleteComment(comment.id, index)">Eliminar</button>
        </li>
    </ul>
</div>
{/literal}