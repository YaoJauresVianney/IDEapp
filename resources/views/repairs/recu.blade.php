<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Reçu de paiement - Facture {{ $repair->reference }}</title>
  <style>
    body{
      color: #444;
      font-family: 'Arial','ArialMT';
      background-size: 100% !important;
      font-size:1.2rem;
      background-repeat: no-repeat !important;
      background-position: center !important;
      border: 2px solid #ddd;
      padding: 30px 10px;
      margin: 60% -10px 0;
      transform: translateY(-50%);
    }
    small {
      display: block;
      font-size: .7em;
      line-height: 1.2em;
    }
    .title{
      font-size: 16px;
      border: 2px solid;
      padding: 10px 20px;
      width: 300px;
      color:#888 !important;
      margin: 15px auto;
    }
    table * {
      vertical-align: top;
    }
    .footer {
        /* border-top: 1px solid #f1f1f1 */;
        padding-top: 10px;
        /* position: fixed; */
        width:100%;
        bottom: 0px;
        /* left: 50%;
        transform: translateX(-50%); */
    }
  </style>
</head>
<body style="background:linear-gradient(rgba(255,255,255,.8), rgba(255,255,255,.8)), url({!! asset('images/logo.png') !!});">
  <div style="margin: 0 20px;">
    <table width="100%">
      <tr>
        <td width="150">
          <img src="{{ asset('images/logo.png') }}" alt="LOGO" width="90px">
        </td>
        <td>
          <h3 style="margin:0">Dépannage</h3>
          <p style="margin:0 0 10px"><small>Pour tous vos travaux de dépannage de véhicules, d'engins de remorquage de véhicules accidentés, en stationnement irrégulier ou panne sur la voie publique</small></p>
        </td>
      </tr>
      <tr>
        <td colspan="2" style="color:#44b932;text-align:center"><h1 class="title">RECU DE PAIEMENT</h1></td>
      </tr>
    </table>
    <table width="100%">
      <tr>
        <td width="20%" colspan="2">Reçu de: <strong>{{ $repair->client->fullname }}</strong></td>
      </tr>
      <tr>
        <td colspan="2">La somme de : <strong>{!! number_format($repair->sumDays()+$repair->tva(),0,'','.') !!} FCFA</strong></td>
      </tr>
        <tr>
            <td colspan="2">
                Pour : <strong>{!! 'Règlement de la facture N°'.$repair->reference !!}</strong>
            </td>
        </tr>
        <tr>
            <td>Immatriculation du véhicule : <strong>{{ $repair->car_imm }}</strong></td>
        </tr>
        <tr>
            <td>Marque du véhicule : <strong>{{ $repair->car_brand }}</strong></td>
        </tr>
        <tr>
            <td>Date d'entrée du véhicule : <strong>{{  date('d-m-Y', strtotime($repair->date_getting)) }} à {{  $repair->hour_getting }}</strong></td>
        </tr>
        <tr>
            <td>Category du véhicule : <strong>{{ $repair->vehiclecategory->type }}</strong></td>
        </tr>
      <tr style="margin-top:15px;display:block;width:100%;">
        <td>
          <strong>Signature</strong>
          <div style="display:block; width:300px; height:100px; border:1px solid #888;"></div>
        </td>
        <td>Fait à Abidjan, le <strong>{{ gmdate('d/m/Y', strtotime($repair->date_release)) }}</strong></td>
      </tr>
    </table>
  </div>
  <!-- <div class="footer" style = "color:#888;font-size:12px;font-family:font-family: Arial,ArialMT !important; text-align:center">
      <div>03 BP 961 ABIDJAN 03 RCCM N°:CI-ABJ-2016-B-983 - SARL au Capital de 500.000 CFA</div>
      <div>CC N°:1601904H Régime Réel Simplifié d'Imposition - Coris Bank: 02347324101 03</div>
      <div>Tél: 23 46 55 71. Cel: 02 54 42 00 / 87 59 14 53 / 02 54 44 42 - Email: Dépannage@gmail.com</div>
      <br>
  </div> -->
  <script rel="text/javascript">
    window.print();
    setTimeout(function () { window.close(); }, 10);
  </script>
</body>
</html>
