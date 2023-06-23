@push('scripts')
  <script src="https://cdn.plaid.com/link/v2/stable/link-initialize.js"></script>

  <script type="text/javascript">
    var handler = Plaid.create({
      apiVersion: 'v2',
      clientName: 'Fundraise.vc',
      env: 'sandbox',
      token: '{{ $connect["plaid_link_token"] }}',
      product: ['auth', "transactions"], // transactions
      //webhook: 'https://webhook.domain', // Optional – use webhooks to get transaction and error updates
      selectAccount: false, // Optional – trigger the Select Account
      onLoad: function() {
        // Optional, called when Link loads
      },
      onSuccess: function(public_token, metadata) {
        console.log('Success!');
        console.log(public_token);
        console.log(metadata);
      },
      onExit: function(err, metadata) {
        // The user exited the Link flow.
        if (err != null) {
          // The user encountered a Plaid API error prior to exiting.
          console.log('Error');
          console.log(err);
          console.log(metadata);
        }
        // metadata contains information about the institution
        // that the user selected and the most recent API request IDs.
        // Storing this information can be helpful for support.
      }
    });

    $('#plaid-link-button').on('click', function(e) {
      handler.open('ins_1');
    });
    </script>
@endpush

@php $stripe_active = false; @endphp
@php $quickbooks_active = false; @endphp
@php $plaid_active = false; @endphp
@foreach ($integrations as $integration)
    @if ($integration->integration_tool == 'stripe')
        @php $stripe_active = true; @endphp
    @endif

    @if ($integration->integration_tool == 'quickbooks')
        @php $quickbooks_active = true; @endphp
    @endif

    @if ($integration->integration_tool == 'plaid')
        @php $plaid_active = true; @endphp
    @endif
@endforeach

<div class="place-item place-hover due-diligence layout-02 {{ !$featured ? '' : 'featured'}}">
    <p class="mb-5">
        <i class="las la-lock dd-status-success"></i> Soft Due Diligence
    </p>
    <div class="row text-center">
        <div class="col-md-4 font-weight-bold">
            <p class="mb-4">
                <i class="las la-wallet fs-30"></i> <br> Payment
            </p>

            <a href="@if(!$stripe_active) $connect['stripe_link'] @endif" class="link-connect text-white stripe @if($stripe_active) disabled @endif">
                <img src="{{ asset('assets/images/stripe.svg') }}" alt="" width="200px">
            </a>

            @if($stripe_active) Connected ✅ @endif
        </div>

        <div class="col-md-4 font-weight-bold">
            <p class="mb-4">
                <i class="las la-file-invoice-dollar fs-30"></i> <br> Accounting
            </p>

            <a href="{{ !$quickbooks_active ? $connect['quickbooks'] : '' }}" class="link-connect text-white quickbooks @if($quickbooks_active) disabled @endif">
                <img src="{{ asset('assets/images/quickbooks.svg') }}" alt="" width="200px">
            </a>

            @if($quickbooks_active) Connected ✅ @endif
        </div>

        <div class="col-md-4 font-weight-bold">
            <p class="mb-4">
                <i class="las la-box-open fs-30"></i>  <br> Open Banking
            </p>

            <button class="text-white plaid @if($plaid_active) disabled @endif" id="{{ $plaid_active ?: 'plaid-link-button'}}" @if($plaid_active) disabled @endif>
                <img src="{{ asset('assets/images/plaid.svg') }}" alt="" width="200px">
            </button>

            {{-- <a href="{{ !$plaid_active ? $connect['plaid_link_token'] : '' }}" class="link-connect text-white plaid @if($plaid_active) disabled @endif">
                <img src="{{ asset('assets/images/plaid.svg') }}" alt="" width="200px">
            </a> --}}

            @if($plaid_active) Connected ✅ @endif
        </div>
    </div>
</div>
