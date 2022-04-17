<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use Illuminate\Http\Request;

class PetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Pet::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'specie' => 'required',
            'color' => 'required',
            'size' => 'required',
        ]);


        $pet = Pet::create([
            'name' => $request['name'],
            'specie' => $request['specie'],
            'color' => $request['color'],
            'size' => $request['size'],
        ]);

        return $pet;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function show(Pet $pet)
    {
        return $pet;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function updates(Request $request, Pet $pet)
    {
        $request->validate([
            'name' => 'required',
            'specie' => 'required',
            'color' => 'required',
            'size' => 'required',
        ]);

        $pet->update([
            'name' => $request['name'],
            'specie' => $request['specie'],
            'color' => $request['color'],
            'size' => $request['size'],
        ]);

        return $pet;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pet $pet)
    {
        $pet->delete();
    }


    static function alterarValoresSize()
    {
        $pets1 = Pet::whereIn('size', ['xs','XS'])->get();
        $pets2 = Pet::whereIn('size', ['sm','SM'])->get();
        $pets3 = Pet::whereIn('size', ['m','M'])->get();
        $pets4 = Pet::whereIn('size', ['l','L'])->get();
        $pets5 = Pet::whereIn('size', ['xl','XL'])->get();

        foreach ($pets1 as $pet){
            switch($pet){
                case 'xs' or 'XS':
                    $pet->update([
                        'size' => 'extra small'
                    ]);
                    break;
                default:
                    break;
            }
            $pet->save();
        }
        foreach ($pets2 as $pet){
            switch($pet){
                case 'sm' or 'SM':
                    $pet->update([
                        'size' => 'medium small'
                    ]);
                    break;
                default:
                    break;
            }
            $pet->save();
        }
        foreach ($pets3 as $pet){
            switch($pet){
                case 'm' or 'M':
                    $pet->update([
                        'size' => 'medium'
                    ]);
                    break;
                default:
                    break;
            }
            $pet->save();
        }
        foreach ($pets4 as $pet){
            switch($pet){
                case 'l' or 'L':
                    $pet->update([
                        'size' => 'large'
                    ]);
                    break;
                default:
                    break;
            }
            $pet->save();
        }
        foreach ($pets5 as $pet){
            switch($pet){
                case 'xl' or 'XL':
                    $pet->update([
                        'size' => 'extra large'
                    ]);
                    break;
                default:
                    break;
            }
            $pet->save();
        }
    }

    static function alterarValoresEspecie(){
        $pets = Pet::all();

        foreach ($pets as $pet){
           if($pet['specie'] != 'cachorro' and $pet['specie'] != 'gato' and $pet['specie'] != 'aves' and $pet['specie'] != 'humano' and
           $pet['specie'] != 'cat' and $pet['specie'] != 'dog'){
            $pet->update([
                'specie' => 'Espécie não definida no sistema'
            ]);
           }
           $pet->save();
        }
    }

}