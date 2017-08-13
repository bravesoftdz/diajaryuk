<!DOCTYPE html>
<html>
<head>
	<title></title>

    <link rel="shortcut icon" type="image/png" href="{{asset('/gambar/lia.png')}}"/>

	   <style type="text/css">
	   	   body{
            padding: 0;margin: 0;
           }
	   	.container{
	   		top:0;
	   		left: 0;
	   		width: 100%;
	   		height: 100%;
	   		margin: 2.5%;
            margin-top: 300px;
	   		/border: 1px solid #000;/
	   		/border-radius: 15px;/
	   	}
        table{
            margin: 5%;
            color: #01558a;
            text-shadow: 0px 0px 10px #fff;
        }

	   </style>
    	


</head>
<body>
	<div class="container" >
  <div class="">
    <div class="header">
    <table cellpadding="1" border="0" cellspacing="2" align="center">
    	
    	<tr>
         <td colspan="2" height="14" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>Ceritificate No.</i> <b>{{$nomorsertifikat}}</b></td>  
          
        </tr>
        <tr>
         <td colspan="2"></td>   
        </tr>
        <tr>
         <td colspan="2"></td>   
        </tr>
        <tr>
         <td colspan="2"></td>   
        </tr>
        <tr>
         <td colspan="2"></td>   
        </tr>
        <tr>
         <td colspan="2"></td>   
        </tr>
        <tr>
         <td colspan="2"></td>   
        </tr>
        <tr>
         <td colspan="2"></td>   
        </tr>
        <tr>
         <td colspan="2"></td>   
        </tr>
        <tr>
         <td colspan="2"></td>   
        </tr>
        <tr>
         <td colspan="2" height="73"></td>   
        </tr>
      
    	<tr>
    		<td colspan="2" height="40"><h1 style="margin-top: 40px;font-size: 23px;line-height: 1;color: #01558a;text-decoration: underline;"> {{$tampil->nama}} </h1></td>
    	</tr>

    	<tr>
    		<td colspan="2" height="45"><h1 ><i>born in <b style="text-transform: capitalize;font-style: normal;">{{$tampil->tempat_lahir}}</b> on {{date('F d, Y',strtotime($tampil->tgl_lahir))}},</i></h1></td>
    	</tr>
    
        <tr>
            <td colspan="2" height="30"><h1 style="margin-top: 40px;font-size: 18.5px;line-height: 1;color: #01558a;"><i>@if($tampil->kelas=="cv"){{"Conversation in English"}}@else{{"English for Adults"}}@endif : @if($tampil->level=="i" || $tampil->level=="ii" || $tampil->level=="iii"){{"Elementary Levels"}}@elseif($tampil->level=="iv" || $tampil->level=="vi"){{"Pre-Intermediate Levels"}}@else{{"Intermediate Levels"}}@endif</i></h1></td>
        </tr>
    	<tr>
         <td colspan="2"></td>   
        </tr>
        <tr>
         <td colspan="2"></td>   
        </tr>
       
      
        <tr>
         <td height="14" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>Issued in Bogor {{date('F d, Y',strtotime($now))}}</i></td>  
          <td height="14" align="right"><b>LUZ S. ISMAIL, MA</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><i>Managing Director</i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> 
        </tr>

    

    
    </table>
    <div style="margin-top: 50px"><br><br><br>
      
    </div>
    </div>
  </div>
</div>
</body>
</html>