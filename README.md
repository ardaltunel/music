# Arda Altunel Music

GitHub Pages uyumlu müzik sitesi. Site statik HTML/CSS/JS olarak yayınlanır; üyelik, giriş, admin paneli, müzik yükleme, düzenleme, yayına alma, gizleme ve silme işlemleri Supabase ile çalışır.

## GitHub Desktop ile Yayınlama

1. GitHub Desktop içinde `File > Add local repository` seç.
2. Bu klasörü seç: `music-github-pages`.
3. Repository henüz GitHub'da yoksa `Publish repository` butonuna bas.
4. Repository public olabilir; Supabase publishable key tarayıcıda kullanılmak için tasarlanmıştır. Secret veya service role key ekleme.
5. GitHub'da repository sayfasından `Settings > Pages` bölümüne gir.
6. `Build and deployment` altında `Deploy from a branch` seç.
7. Branch olarak `main`, klasör olarak `/root` seçip kaydet.
8. GitHub Pages adresin genelde şu formatta olur: `https://kullaniciadi.github.io/repository-adi/`

## Supabase Ayarları

Projede Supabase bağlantısı hazır:

```js
window.MUSIC_SUPABASE_CONFIG = {
    url: 'https://zgqjzsueslitzyewoqwc.supabase.co',
    anonKey: 'sb_publishable_xfxNXDMVm-7J3n9TsRHMXw_2T8QktSg',
    storageBucket: 'music-files'
};
```

Yeni Supabase projesi kullanırsan bu değerleri `js/supabase-config.js` içinde değiştir.

## Supabase SQL Kurulumu

İlk kurulum için Supabase Dashboard > SQL Editor içinde sırayla çalıştır:

1. `supabase/schema.sql`
2. `supabase/seed-songs.sql`
3. Admin butonları çalışmazsa ek olarak `supabase/admin-actions-policies.sql`

İlk hesabını siteden oluşturduktan sonra onu admin yapmak için SQL Editor'da çalıştır:

```sql
update public.profiles
set role = 'admin'
where email = 'senin-email-adresin@example.com';
```

## Authentication URL Ayarı

Supabase Dashboard > Authentication > URL Configuration bölümünde GitHub Pages adresini ekle:

- Site URL: GitHub Pages adresin
- Redirect URLs: GitHub Pages adresin ve gerekirse `login.html`, `admin.html`, `upload.html` sayfaları

Örnek:

```text
https://kullaniciadi.github.io/repository-adi/
https://kullaniciadi.github.io/repository-adi/login.html
https://kullaniciadi.github.io/repository-adi/admin.html
https://kullaniciadi.github.io/repository-adi/upload.html
```

## Dosyalar ve Boyut

- Eski şarkı dosyaları `uploaded_music/` içinde duruyor, eski kapaklar `uploaded_album/` içinde duruyor.
- Toplam proje boyutu yaklaşık 137 MB. GitHub'a yüklenebilir; en büyük tek dosya 100 MB sınırının altında.
- Yeni yüklenen müzikler Supabase Storage içindeki `music-files` bucket'ına gider.

## Güvenlik Notları

- `sb_publishable...` anahtarı public istemci anahtarıdır, GitHub'da durabilir.
- `sb_secret...`, `service_role`, veritabanı şifresi veya `.env` dosyası GitHub'a koyma.
- Admin yetkisi sadece Supabase `profiles.role = 'admin'` olan kullanıcıda çalışır.
