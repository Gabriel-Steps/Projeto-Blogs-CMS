const url = 'http://localhost/ProjetoBlogsOnline/src/backend/obterInformacoesPosts.php';

async function carregarPosts() {
    try {
        const response = await fetch(url);
        if (!response.ok) {
            throw new Error(`Erro ao buscar os posts: ${response.statusText}`);
        }
        const posts = await response.json();
        const container = document.getElementById('container-posts');
        container.innerHTML = '';
        posts.forEach((post) => {
            [ano, mes, dia] = post.data_criacao.split('-')
            const elemento = document.createElement('div');
            elemento.className = 'containerPostagem';
            elemento.innerHTML = `
                <div class='containerInfoUsuario'>
                    <img src="${'https://localhost/ProjetoBlogsOnline/src/' + post.imagem_usuario}" alt="${post.nome_usuario}" class="imagemPerfilPost">
                    ${post.nome_usuario}
                </div>
                <h2>${post.titulo}</h2>
                <p>${post.conteudo}</p>
                <p>Publicado dia: ${dia}/${mes}/${ano}</p>
            `;
            container.appendChild(elemento);
        });
    } catch (erro) {
        console.error('Erro:', erro);
    }
}

document.addEventListener('DOMContentLoaded', carregarPosts);