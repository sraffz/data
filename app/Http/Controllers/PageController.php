<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data_Kategori_Jabatan;
use App\Data_jabatan;
use App\Data_Skim;
use App\Data_Gred;
use App\Data_Jawatan;
use App\Data_Pegawai;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page)
    {
        $kategori = Data_Kategori_Jabatan::all();

        $jabatan = Data_jabatan::all();
        $skim = Data_Skim::all();

        $gred = Data_Skim::join('data_gred', 'data_gred.id_skim', '=', 'data_skim.id')
        ->orderBy('data_gred.gred', 'desc')
        ->get();

        if (view()->exists("pages.{$page}")) {
            return view("pages.{$page}", compact('kategori', 'jabatan', 'skim', 'gred'));
        }
        return abort(404);
    }

    public function withid($page, $id)
    {     
        $skim = Data_Skim::where('id', $id)
        ->get();

        $gred = Data_gred::where('id_skim', $id)
        ->orderBy('gred', 'desc')
        ->get();

        $gred_skim = Data_Skim::join('data_gred', 'data_gred.id_skim', '=', 'data_skim.id')
        ->orderBy('data_gred.gred', 'desc')
        ->get();

        $jawatan = Data_Jawatan::select('data_jawatan.*','data_gred.gred', 'data_skim.kod_skim')
        ->where('id_jabatan', $id)
        ->join('data_gred', 'data_gred.id', '=', 'data_jawatan.gred')
        ->join('data_skim', 'data_skim.id', '=', 'data_gred.id_skim')
        ->get();

        $gred2 = Data_Skim::join('data_gred', 'data_gred.id_skim', '=', 'data_skim.id')
        ->where('data_gred.id', $id)
        ->orderBy('data_gred.gred', 'desc')
        ->get();

        $jabatan = Data_jabatan::all();

        $listpegawai = Data_Pegawai::select('data_pegawai.*', 'data_jawatan.jawatan')
        ->where('data_pegawai.id_gred', $id)
        ->join('data_jawatan', 'data_jawatan.id', 'data_pegawai.id_jawatan')
        ->get();

        $jawatan_sandangan = Data_Jawatan::where('gred', $id)
        ->get();

        if (view()->exists("pages.{$page}")) {
            return view("pages.{$page}", compact('skim', 'gred', 'jawatan', 'jabatan', 'id', 'gred2', 'listpegawai', 'gred_skim', 'jawatan_sandangan'));
        }
        return abort(404);
    }

    public function pgw($page, $id)
    {
        if (view()->exists("pegawai.{$page}")) {
            return view("pegawai.{$page}");
        }
        return abort(404);
    }

    public function tambahjabatan(Request $request)
    {
        $tambahjabatan = new Data_jabatan;
        $tambahjabatan->jabatan = $request->input('jabatan');
        $tambahjabatan->id_kategori = $request->input('kategori');
        $tambahjabatan->save();

        return back()->with('success', 'Jabatan/Agensi telah berjaya ditambah');
    }

    public function tambahskim(Request $request)
    {
        $tambahskim = new Data_Skim;
        $tambahskim->nama_skim = $request->input('nama_skim');
        $tambahskim->jenis_skim = $request->input('jenis_skim');
        $tambahskim->kod_skim = $request->input('kod_skim');
        $tambahskim->save();

        return back()->with('success', 'Skim perkhidmatan telah berjaya ditambah');
    }

    public function tambahgred(Request $request)
    {
        $tambahgred = new Data_Gred;
        $tambahgred->id_skim = $request->input('id_skim');
        $tambahgred->gred = $request->input('gred');
        $tambahgred->gaji_min = $request->input('gaji_min');
        $tambahgred->gaji_max = $request->input('gaji_max');
        $tambahgred->kadar_kenaikan = $request->input('kadar_kenaikan');
        $tambahgred->save();

        return back()->with('success', 'Gred telah berjaya ditambah');
    }

    public function tambahjawatan(Request $request)
    {
        $tambahjawatan = new Data_Jawatan;
        $tambahjawatan->id_jabatan = $request->input('id_jabatan');
        $tambahjawatan->jawatan = $request->input('jawatan');
        $tambahjawatan->gred = $request->input('gred');
        $tambahjawatan->jenis = $request->input('jenis');
        $tambahjawatan->gred_min = $request->input('gred_min');
        $tambahjawatan->gred_max = $request->input('gred_max');
        $tambahjawatan->id_pemberian = $request->input('id_pemberian');
        $tambahjawatan->save();

        return back()->with('success', 'Jawatan telah berjaya ditambah');
    }

    public function tambahpegawai(Request $request)
    {
        $tambahpegawai = new Data_Pegawai;
        $tambahpegawai->nama = $request->input('nama');
        $tambahpegawai->no_kp = $request->input('no_kp');
        $tambahpegawai->tarikh_lahir = $request->input('tarikh_lahir');
        $tambahpegawai->id_gred = $request->input('id_gred');
        $tambahpegawai->id_jawatan = $request->input('id_jawatan');
        $tambahpegawai->save();

        return back()->with('success', 'Pegawai telah berjaya ditambah');
    }  
}
