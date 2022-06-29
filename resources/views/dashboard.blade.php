<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<h1 onclick="change_message()"> Click Me {{ $pokemon_name }} </h1>

<div>
    <ol id="abilities">

    </ol>
</div>

<script>
// axios dengan ajax itu sama, beda library aja
// kalo pakai ajax, itu berarti pakai jquery
// kalo axios, itu lib axios, dan biasanya frontend menggunakan framework vue.js

function change_message(){
    axios.get('https://pokeapi.co/api/v2/pokemon/{{ $pokemon_name }}')
    .then(function (response) {
        // handle success
        // console.log(response.data.abilites);
        // console.log(response.data);
        abilities= response.data.abilities;
        console.log(abilities);
        for(var i=0; i < abilities.length; i++){
            index= i+1;
            var text= "<li> ability ke - "+ index +  " dengan nama : " + abilities[i]['ability']['name'] + " </li>"
            document.getElementById("abilities").innerHTML += text;
            // console.log(abilities[i]['ability']['name']);
        }
    })
    .catch(function (error) {
        // handle error
        console.log(error);
    });
}
</script>