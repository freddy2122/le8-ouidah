<!DOCTYPE html>
<html lang="{{ $booking->locale }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('Votre demande de réservation Le 8') }}</title>
</head>
<body style="margin:0; padding:0; background-color:#F7F1E6; font-family:Arial, Helvetica, sans-serif; color:#241714;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#F7F1E6; padding:24px 0;">
        <tr>
            <td align="center">
                <table role="presentation" width="600" cellpadding="0" cellspacing="0" style="background-color:#ffffff; border-radius:12px; overflow:hidden;">
                    <tr>
                        <td style="background-color:#241714; padding:24px 32px;">
                            <span style="font-size:22px; font-weight:bold; color:#ffffff;">Le 8</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:32px;">
                            <p style="font-size:13px; color:#B3272D; font-weight:bold; margin:0 0 8px;">
                                {{ __('Réf. :reference', ['reference' => $booking->reference]) }}
                            </p>
                            <h1 style="font-size:22px; margin:0 0 16px;">{{ __('Nous avons bien reçu votre demande de réservation') }}</h1>
                            <p style="font-size:14px; line-height:1.6; color:#4a3c38;">
                                {{ __('Bonjour :name,', ['name' => $booking->guest_name]) }}<br>
                                {{ __('Voici le récapitulatif de votre demande. Notre équipe vous recontacte sous 24h par WhatsApp ou email avec les instructions de paiement de l\'acompte pour confirmer définitivement votre réservation.') }}
                            </p>

                            <table role="presentation" width="100%" cellpadding="8" cellspacing="0" style="margin:24px 0; font-size:14px; border-collapse:collapse;">
                                <tr>
                                    <td style="color:#7a6b65;">{{ __('Tente') }}</td>
                                    <td style="text-align:right; font-weight:bold;">{{ $booking->tent_name }}</td>
                                </tr>
                                <tr>
                                    <td style="color:#7a6b65;">{{ __('Voyageurs') }}</td>
                                    <td style="text-align:right;">{{ $booking->guests }} {{ __('personne(s)') }}</td>
                                </tr>
                                <tr>
                                    <td style="color:#7a6b65;">{{ __('Arrivée') }}</td>
                                    <td style="text-align:right;">{{ $booking->check_in->translatedFormat('d F Y') }}</td>
                                </tr>
                                <tr>
                                    <td style="color:#7a6b65;">{{ __('Départ') }}</td>
                                    <td style="text-align:right;">{{ $booking->check_out->translatedFormat('d F Y') }}</td>
                                </tr>
                                <tr>
                                    <td style="color:#7a6b65;">{{ __('Nuits') }}</td>
                                    <td style="text-align:right;">{{ $booking->nights }}</td>
                                </tr>
                                <tr>
                                    <td style="padding-top:12px; border-top:1px solid #eee; font-weight:bold;">{{ __('Total du séjour') }}</td>
                                    <td style="padding-top:12px; border-top:1px solid #eee; text-align:right; font-weight:bold;">{{ \App\Support\Pricing::formatXof($booking->total_xof) }}</td>
                                </tr>
                                <tr>
                                    <td style="color:#B3272D; font-weight:bold;">{{ __('Acompte (:percent%) à régler pour confirmer', ['percent' => $booking->deposit_percent]) }}</td>
                                    <td style="text-align:right; color:#B3272D; font-weight:bold;">{{ \App\Support\Pricing::formatXof($booking->deposit_xof) }}</td>
                                </tr>
                                <tr>
                                    <td style="color:#7a6b65;">{{ __('Solde à régler sur place') }}</td>
                                    <td style="text-align:right;">{{ \App\Support\Pricing::formatXof($booking->balance_xof) }}</td>
                                </tr>
                            </table>

                            <div style="background-color:#F7F1E6; border-radius:8px; padding:16px; font-size:13px; color:#4a3c38; margin-bottom:24px;">
                                <strong>{{ __('Politique d\'annulation :') }}</strong>
                                {{ __('L\'acompte de :percent% n\'est pas remboursable en cas d\'annulation.', ['percent' => $booking->deposit_percent]) }}
                            </div>

                            <p style="font-size:14px; line-height:1.6; color:#4a3c38;">
                                <strong>{{ __('Localisation :') }}</strong> {{ config('le8.company.address.line1') }}, {{ config('le8.company.address.city') }}, {{ config('le8.company.address.country') }}<br>
                                <strong>{{ __('Contact WhatsApp :') }}</strong> {{ config('le8.company.whatsapp') }}<br>
                                <strong>{{ __('Email :') }}</strong> {{ config('le8.company.email') }}
                            </p>

                            <p style="font-size:14px; line-height:1.6; color:#4a3c38;">
                                {{ __('Instructions d\'arrivée détaillées (transport, check-in) : voir la page « Préparer mon séjour » sur notre site.') }}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color:#241714; padding:20px 32px; font-size:11px; color:#b8aba6;">
                            {{ config('le8.company.legal_name') }} — {{ config('le8.company.address.line1') }}, {{ config('le8.company.address.country') }}<br>
                            {{ __('Hébergement indépendant, non affilié aux Vodun Days.') }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
