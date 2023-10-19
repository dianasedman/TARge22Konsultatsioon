# TARge22Konsultatsioon

Nimed: Diana Sedman ja Doris Välis

\*Andmetabel konsultatsioon(id, nimi, päev, tund, klassiruum, periood, kommentaar)
http://www.tthk.ee/wp-content/uploads/2018/02/Oppetookalender_2017_2018_16.02.18-1.pdf

*Loo veebileht, kus saab konsultatsiooni sisestada. Igale 5 nädalasele perioodile.
*Õpetaja nimed lisa vormile ripploendisse. samuti tunnid, päevad ja perioodid.

\*Loo veebileht, kus kuvatakse antud perioodi kõik sisestatud konsultatsioonid.

\*Igal õpetajal peab olema igas perioodis vähemalt 2 konsultatsiooni.

\*Too esile õpetajad, kelle konsultatsioon on lisamata.

# Rakenduse lehed

*Konsultatsiooni sisestamise leht
*Õpetaja sisestab oma aine, kellaaja ja klassi, millal toimub tema konsultatsioon

*Üldlehekülg
*Kuvatakse kõik konsultatsiooni aegu õpetajate kaupa

*Puuduvad konsultatsiooni ajad - Kool, Õpetaja
*Kuvatakse õpetajad, kellel on sisestatud nõutust vähem konsultatsioone

*Admin lehekülg
*Kuvab kõik konsultatsiooni ajad ja saab vajadusel kustutada ebasobivad või valed sisestused

#SQL käsud
CREATE TABLE `opetaja` (
`id` int(11) NOT NULL,
`opetajanimi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `opetaja`
ADD PRIMARY KEY (`id`);

ALTER TABLE `opetaja`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;
