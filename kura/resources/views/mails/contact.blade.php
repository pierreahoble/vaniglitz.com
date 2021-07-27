@extends('mails.layouts.app')

@section('content')
    <!-- big image section -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="ffffff" class="bg_color">

        <tr>
            <td align="center">
                <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">
                    <tr>
                        <td align="center" class="section-img">
                            <a href="" style=" border-style: none !important; display: block; border: 0 !important; border-radius: 50px"><img src="{{ url(env('STORAGE_PATH').'uploads/avatars/'.$photo) }}" style="display: block; width: 100px;" width="100" border="0" alt="" /></a>
                            <br>
                            <b>{{ $name }}</b>
                            <br>
                            <b>{{ $phone }}</b>
                        </td>
                    </tr>
                    <tr>
                        <td height="20" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center" style="color: #343434; font-size: 24px; font-family: Quicksand, Calibri, sans-serif; font-weight:700;letter-spacing: 3px; line-height: 35px;" class="main-header">


                            <div style="line-height: 35px">

                                <span style="color: #5caad2;">CONTACT</span>

                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                    </tr>

                    <tr>
                        <td align="center">
                            <table border="0" width="40" align="center" cellpadding="0" cellspacing="0" bgcolor="eeeeee">
                                <tr>
                                    <td height="2" style="font-size: 2px; line-height: 2px;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td height="20" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
                    </tr>

                    <tr>
                        <td align="center">
                            <table border="0" width="400" align="center" cellpadding="0" cellspacing="0" class="container590">
                                <tr>
                                    <td align="center" style="color: #888888; font-size: 16px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;">
                                        <div style="line-height: 24px">
                                           {{ $msg }}
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                    </tr>

                    <tr>
                        <td align="center">
                            {{--<table border="0" align="center" width="160" cellpadding="0" cellspacing="0" bgcolor="5caad2" style="">--}}

                                {{--<tr>--}}
                                    {{--<td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>--}}
                                {{--</tr>--}}

                                {{--<tr>--}}
                                    {{--<td align="center" style="color: #ffffff; font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 26px;">--}}
                                        {{--<div style="line-height: 26px;">--}}
                                            {{--<a href="{{ route('intranet.indexReservation') }}" style="color: #ffffff; text-decoration: none;">CONSULTER</a>--}}
                                        {{--</div>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}

                                {{--<tr>--}}
                                    {{--<td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>--}}
                                {{--</tr>--}}

                            {{--</table>--}}
                        </td>
                    </tr>


                </table>

            </td>
        </tr>

    </table>
    <!-- end section -->
@endsection