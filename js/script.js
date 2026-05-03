let playBtn = document.querySelectorAll('.playlist .box-container .box .play');
let musicPlayer = document.querySelector('.music-player');

document.querySelectorAll('.message').forEach(message => {
    setTimeout(() => {
        message.remove();
    }, 7000);
});

document.querySelectorAll('.toggle-password').forEach(button => {
    button.addEventListener('click', function () {
        const field = this.parentElement.querySelector('input');
        const icon = this.querySelector('i');

        if (!field) {
            return;
        }

        const isHidden = field.type === 'password';
        field.type = isHidden ? 'text' : 'password';
        this.setAttribute('aria-label', isHidden ? 'Şifreyi gizle' : 'Şifreyi göster');

        if (icon) {
            icon.classList.toggle('fa-eye', !isHidden);
            icon.classList.toggle('fa-eye-slash', isHidden);
        }
    });
});

if (musicPlayer) {
let musicAlbum = musicPlayer.querySelector('.album');
let musicName = musicPlayer.querySelector('.name');
let musicArtist = musicPlayer.querySelector('.artist');
let music = musicPlayer.querySelector('.music');

let prevSongButton = musicPlayer.querySelector('#prev_song_button');
let nextSongButton = musicPlayer.querySelector('#next_song_button');

playBtn.forEach(play => {

    play.onclick = () => {
        let src = play.getAttribute('data-src');
        let id = play.getAttribute('data-id');
        let box = play.parentElement.parentElement;
        let name = box.querySelector('.name');
        let album = box.querySelector('.album');
        let artist = box.querySelector('.artist');

        musicAlbum.src = album.src;
        musicName.innerHTML = name.innerHTML;
        musicArtist.innerHTML = artist.innerHTML;
        music.src = src;
        prevSongButton.setAttribute("data-id", id);
        nextSongButton.setAttribute("data-id", id);
        musicPlayer.classList.add('active');

        music.play();
    }
});

document.querySelector('#close').onclick = () => {
    musicPlayer.classList.remove('active');
    music.pause();
}


var modal = document.getElementById("myModal");

window.onclick = function (event) {
    if (event.target == modal) {
        musicPlayer.classList.remove('active');
        music.pause();
    }
}

function requestSong(url, dataId) {
    $.ajax({
        url: url,
        type: 'GET',
        dataType: "json",
        data: {
            song_id: dataId,
            search: window.currentSearch || '',
        },
        success: function (song) {
            if (song) {
                musicAlbum.src = song.album ? "uploaded_album/" + song.album : "images/disc.png";
                musicName.textContent = song.name;
                musicArtist.textContent = song.artist;
                music.src = "uploaded_music/" + song.music;

                prevSongButton.setAttribute("data-id", song.id);
                nextSongButton.setAttribute("data-id", song.id);

                music.play();
            }
        }
    });
}

nextSongButton.addEventListener('click', function () {
    requestSong('get-next-song.php', nextSongButton.getAttribute("data-id"));
});

prevSongButton.addEventListener('click', function () {
    requestSong('get-prev-song.php', prevSongButton.getAttribute("data-id"));
});

music.addEventListener('ended', function () {
    requestSong('get-next-song.php', nextSongButton.getAttribute("data-id"));
});
}
