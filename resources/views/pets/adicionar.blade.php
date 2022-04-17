Adicionar novo pet:

<form action="/pets" method="post">
    @csrf

    <label for="name">Nome</label>
    <input id="name" name="name" type="text" /> <br/>

    <label for="color">Cor</label>
    <input id="color" name="color" type="text" /> <br/>

    <label for="specie">Especie</label>
    <select name="specie" id="specie">
        <option value="cachorro">Cachorro</option>
        <option value="gato">Gato</option>
        <option value="aves">Aves</option>
        <option value="humanos">Humanos</option>
    </select>

    <label for="size">Size</label>
    <select name="size" id="size">
        <option value="extra small">Extra small</option>
        <option value="medium small">Medium small</option>
        <option value="mediu">Medium</option>
        <option value="large">Large</option>
        <option value="extra large">Extra Large</option>
    </select>

    <br/>
    <button type="submit">
        Cadastrar
    </button>
</form>

<a href="/pets">Voltar</a>

