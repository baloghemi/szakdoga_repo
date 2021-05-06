<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([
            'title' => 'Bátorság',
            'text' => 'Ne félj attól, hogy mit fognak gondolni mások az ötleteidről! Mehettek egy kört is, és mindenki mondja el, hogy milyen ötletei vannak a fejében!
            Ne félj megkérdőjelezni azt, ami szerinted nem helyes, hisz lehet, hogy fontos hiányosságra világíthatsz rá!
            Merj kérdéseket feltenni (pl.: tanároknak, csapattársaidnak)! Fontos, hogy elkerüljétek az esetleges félreértéseket.
            Forrás: Bornemisza Barbara - Jógyakorlat gyűjtemény létrehozása agilis Visszatekintők támogatásához - Diplomamunka',  
            'tag1' => 'test',
            'tag2' => 'blog',
            'tag3' => 'tag1',            
            'user_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('blogs')->insert([
            'title' => 'Csapatmunka',
            'text' => 'Minden nap kommunikáljatok egymással!
            Vegyetek részt csapatépítő programokon! Hasznosak lehetnek a logikai játékok, melyet akár online is játszhattok.
            Határozzátok meg a csapatban való dolgozáshoz nélkülözhetetlen szabályokat minél előbb! Például: találkozók időpontja, meghallgatjuk a másikat, megbeszéljük az esetleges problémákat stb.
            Próbáljátok meg kihasználni egymás erősségeit!
            Köszönjétek meg egymásnak, a segítséget, illetve azt, ha valaki időben megcsinálta a rá bízott feladatot!
            Ha nem értetek egyet, akkor próbáljatok kompromisszumos megoldást találni!
            Ünnepeljétek meg a sprint lezárását!
            Forrás: Bornemisza Barbara - Jógyakorlat gyűjtemény létrehozása agilis Visszatekintők támogatásához - Diplomamunka', 
            'tag1' => 'test',
            'tag2' => 'blog',
            'tag3' => 'tag1', 
            'user_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('blogs')->insert([
            'title' => 'Csapat teljesítménye',
            'text' => 'Ha túl sok feladatod van, akkor kérj segítséget a többiektől, akiknek esetleg kevesebb van!
            Mindenkinek osszatok fontos, ne csak egyszerűbb feladatokat is!
            Tartsatok meetingeket, ahol megbeszélitek az esetleges elakadásokat! Ezek a meetingek 15-30 perces legyenek, és minél fókuszáltabbak!
            Ne tűzzetek ki elérhetetlennek tűnő célokat!
            Mindenki legyen tisztában a tőle elvárt feladatokkal, ezeket egyértelműen határozzátok meg!
            Forrás: Bornemisza Barbara - Jógyakorlat gyűjtemény létrehozása agilis Visszatekintők támogatásához - Diplomamunka', 
            'tag1' => 'test',
            'tag2' => 'blog',
            'tag3' => 'tag2',
            'user_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('blogs')->insert([
            'title' => 'Együttműködés',
            'text' => 'Próbáljatok meg minél többet együtt dolgozni, akár személyes találkozások alkalmával, akár videó konferenciával!
            A konfliktusokat próbáljátok meg minél gyorsabban kezelni!
            A feladatok megoldása legyen ugyanannyira fontos, mint az emberi kapcsolatok ápolása a csapatban!
            Forrás: Bornemisza Barbara - Jógyakorlat gyűjtemény létrehozása agilis Visszatekintők támogatásához - Diplomamunka',  
            'tag1' => 'test',
            'tag2' => 'blog',
            'tag3' => 'tag2',
            'user_id' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('blogs')->insert([
            'title' => 'Feladatmegértés',
            'text' => 'Merj kérdezni a tanártól vagy a csapattársaidtól, ha valami nem világos!
            Többször is olvasd el a feladatot, hisz nem mindig egyértelműek a leírások!
            Beszéljétek meg a feladatokat, hogy mindenki számára ugyanazt jelentsék!
            A futam egyes feladatainak meghatározásánál próbáljatok minél érthetőbben fogalmazni, esetlegesen bővebb magyarázatot hozzáfűzni!
            Sokszor akkor is érdemes rákérdezni a feladatra, ha úgy érzed, hogy teljesen mértékben megértetted.
            Forrás: Bornemisza Barbara - Jógyakorlat gyűjtemény létrehozása agilis Visszatekintők támogatásához - Diplomamunka', 
            'tag1' => 'test',
            'tag2' => 'blog',
            'tag3' => 'tag1',
            'user_id' => '6',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
