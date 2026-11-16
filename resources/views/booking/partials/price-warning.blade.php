{{-- Cảnh báo bill tính sai giá: có món đơn giá < 1.000đ (nhập thiếu 000) --}}
@php
  $wrongPriceLines = $item->details->filter(function ($d) { return (float) $d->price < 1000; });
@endphp
@if($wrongPriceLines->count())
  <div class="bk-note" style="font-style:normal;background:#fdecea;border:1px solid #e74c3c;border-radius:4px;padding:4px 6px;margin:4px 0;text-transform:none">
    <i class="fa fa-exclamation-triangle"></i> {{ __('CẢNH BÁO: ĐƠN TÍNH SAI GIÁ') }} —
    @foreach($wrongPriceLines as $d)
      {{ $d->dish ? $d->dish->name : ('#' . $d->dish_id) }} ({{ number_format($d->price) }}đ)@if(!$loop->last), @endif
    @endforeach
    . {{ __('Giá món dưới 1.000đ, kiểm tra lại và thêm 000 cho đúng.') }}
  </div>
@endif
