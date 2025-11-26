# Midtrans Callback Setup

## Endpoint yang Sudah Dibuat

### API Route
- **URL**: `POST /api/midtrans/callback`
- **Controller**: `App\Http\Controllers\Api\MidtransCallbackController@callback`
- **Middleware**: Tidak ada (public endpoint untuk Midtrans)

## Cara Setup di Midtrans Dashboard

1. Login ke [Midtrans Dashboard](https://dashboard.midtrans.com) (atau sandbox: https://dashboard.sandbox.midtrans.com)
2. Pilih environment (Sandbox/Production)
3. Pergi ke **Settings** → **Configuration**
4. Di bagian **Payment Notification URL**, masukkan:
   ```
   https://duniakarya.store/api/midtrans/callback
   ```
5. Klik **Update**

## Status yang Dihandle

Callback akan mengupdate status order berdasarkan notification dari Midtrans:

- `capture` → `paid` (jika bukan fraud)
- `settlement` → `paid`
- `pending` → `pending`
- `deny` → `failed`
- `expire` → `expired`
- `cancel` → `cancelled`

## Testing Callback

Untuk testing di local development, gunakan tools seperti:
- **ngrok**: `ngrok http 8000`
- **Expose**: `expose share http://localhost:8000`

Kemudian set notification URL di Midtrans Dashboard ke URL ngrok/expose Anda.

## Log

Semua callback akan dicatat di `storage/logs/laravel.log` dengan prefix `Midtrans Callback`.

## Keamanan

⚠️ **PENTING**: Callback endpoint ini public (tanpa auth) karena dipanggil oleh Midtrans server. Validasi dilakukan melalui:
1. Midtrans Notification signature verification (built-in di SDK)
2. Server Key validation
3. Order ID validation

Jangan tambahkan middleware `auth` atau CSRF protection ke route ini!
