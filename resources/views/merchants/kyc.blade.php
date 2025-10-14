@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto bg-gradient-to-b from-purple-50 via-blue-50 to-white rounded-3xl shadow-2xl p-10 mt-10 mb-10">

    <h2 class="text-3xl font-extrabold mb-10 text-center text-transparent bg-clip-text bg-gradient-to-r from-purple-700 via-blue-700 to-blue-500">
        Merchant KYC Verification
    </h2>

    {{-- Progress Steps --}}
    <div class="relative flex justify-between items-center mb-12">
        <div class="absolute top-1/2 left-0 w-full h-2 bg-gray-200 transform -translate-y-1/2 rounded"></div>

        <div id="step1Indicator" class="z-10 w-12 h-12 rounded-full flex items-center justify-center bg-gradient-to-r from-purple-600 via-blue-600 to-indigo-600 text-white font-bold shadow-lg transform scale-110">1</div>
        <div id="step2Indicator" class="z-10 w-12 h-12 rounded-full flex items-center justify-center bg-gray-300 text-gray-600 font-bold shadow-md">2</div>
        <div id="step3Indicator" class="z-10 w-12 h-12 rounded-full flex items-center justify-center bg-gray-300 text-gray-600 font-bold shadow-md">3</div>
        <div id="step4Indicator" class="z-10 w-12 h-12 rounded-full flex items-center justify-center bg-gray-300 text-gray-600 font-bold shadow-md">4</div>
    </div>

    {{-- Form --}}
    <form id="kycForm" action="{{ route('merchant.kyc.submit') }}" method="POST" enctype="multipart/form-data" class="space-y-10">
        @csrf

        {{-- STEP 1: Business Info --}}
        <div id="step1" class="step p-6 bg-white rounded-2xl shadow-inner transition-all duration-500">
            <h3 class="text-2xl font-semibold text-purple-700 mb-5">Step 1: Business Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block mb-1 font-medium text-gray-700">Business Name *</label>
                    <input type="text" name="business_name" class="w-full border-2 border-purple-300 focus:border-purple-500 p-3 rounded-lg shadow-sm" required>
                </div>
                <div>
                    <label class="block mb-1 font-medium text-gray-700">Business Type *</label>
                    <select name="business_type" class="w-full border-2 border-purple-300 focus:border-purple-500 p-3 rounded-lg shadow-sm" required>
                        <option value="">Select Type</option>
                        <option>Proprietorship</option>
                        <option>Partnership</option>
                        <option>Private Limited</option>
                        <option>LLP</option>
                        <option>NGO</option>
                    </select>
                </div>

                <div>
                    <label class="block mb-1 font-medium text-gray-700">Business PAN</label>
                    <input type="text" name="business_pan" maxlength="10" class="w-full border-2 border-purple-300 focus:border-purple-500 p-3 rounded-lg shadow-sm uppercase">
                </div>

                <div>
                    <label class="block mb-1 font-medium text-gray-700">GST Number</label>
                    <input type="text" name="gst_number" maxlength="15" class="w-full border-2 border-purple-300 focus:border-purple-500 p-3 rounded-lg shadow-sm uppercase">
                </div>

                <div class="md:col-span-2">
                    <label class="block mb-1 font-medium text-gray-700">Registered Address</label>
                    <textarea name="registered_address" rows="2" class="w-full border-2 border-purple-300 focus:border-purple-500 p-3 rounded-lg shadow-sm"></textarea>
                </div>

                <div>
                    <label class="block mb-1 font-medium text-gray-700">Business Category</label>
                    <input type="text" name="business_category" class="w-full border-2 border-purple-300 focus:border-purple-500 p-3 rounded-lg shadow-sm">
                </div>

                <div>
                    <label class="block mb-1 font-medium text-gray-700">Website / App URL</label>
                    <input type="url" name="business_website" class="w-full border-2 border-purple-300 focus:border-purple-500 p-3 rounded-lg shadow-sm">
                </div>
            </div>
        </div>

        {{-- STEP 2: Owner Details --}}
        <div id="step2" class="step hidden p-6 bg-white rounded-2xl shadow-inner transition-all duration-500">
            <h3 class="text-2xl font-semibold text-purple-700 mb-5">Step 2: Owner / Authorized Signatory</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block mb-1 font-medium text-gray-700">Full Name *</label>
                    <input type="text" name="owner_name" class="w-full border-2 border-blue-300 focus:border-blue-500 p-3 rounded-lg shadow-sm" required>
                </div>
                <div>
                    <label class="block mb-1 font-medium text-gray-700">Email *</label>
                    <input type="email" name="owner_email" class="w-full border-2 border-blue-300 focus:border-blue-500 p-3 rounded-lg shadow-sm" required>
                </div>
                <div>
                    <label class="block mb-1 font-medium text-gray-700">Mobile Number *</label>
                    <input type="text" name="owner_mobile" maxlength="10" class="w-full border-2 border-blue-300 focus:border-blue-500 p-3 rounded-lg shadow-sm" required>
                </div>
                <div>
                    <label class="block mb-1 font-medium text-gray-700">Date of Birth</label>
                    <input type="date" name="owner_dob" class="w-full border-2 border-blue-300 focus:border-blue-500 p-3 rounded-lg shadow-sm">
                </div>
                <div>
                    <label class="block mb-1 font-medium text-gray-700">PAN Number</label>
                    <input type="text" name="owner_pan" maxlength="10" class="w-full border-2 border-blue-300 focus:border-blue-500 p-3 rounded-lg shadow-sm uppercase">
                </div>
                <div>
                    <label class="block mb-1 font-medium text-gray-700">Aadhaar Number</label>
                    <input type="text" name="owner_aadhaar" maxlength="12" class="w-full border-2 border-blue-300 focus:border-blue-500 p-3 rounded-lg shadow-sm">
                </div>
            </div>
        </div>

        {{-- STEP 3: Bank Details --}}
        <div id="step3" class="step hidden p-6 bg-white rounded-2xl shadow-inner transition-all duration-500">
            <h3 class="text-2xl font-semibold text-purple-700 mb-5">Step 3: Bank Account Details</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block mb-1 font-medium text-gray-700">Account Holder Name *</label>
                    <input type="text" name="account_holder" class="w-full border-2 border-indigo-300 focus:border-indigo-500 p-3 rounded-lg shadow-sm" required>
                </div>
                <div>
                    <label class="block mb-1 font-medium text-gray-700">Account Number *</label>
                    <input type="text" name="account_number" class="w-full border-2 border-indigo-300 focus:border-indigo-500 p-3 rounded-lg shadow-sm" required>
                </div>
                <div>
                    <label class="block mb-1 font-medium text-gray-700">IFSC Code *</label>
                    <input type="text" name="ifsc" maxlength="11" class="w-full border-2 border-indigo-300 focus:border-indigo-500 p-3 rounded-lg shadow-sm" required>
                </div>
                <div>
                    <label class="block mb-1 font-medium text-gray-700">Bank Name</label>
                    <input type="text" name="bank_name" class="w-full border-2 border-indigo-300 focus:border-indigo-500 p-3 rounded-lg shadow-sm">
                </div>
            </div>
        </div>

        {{-- STEP 4: Document Uploads --}}
        <div id="step4" class="step hidden p-6 bg-white rounded-2xl shadow-inner transition-all duration-500">
            <h3 class="text-2xl font-semibold text-purple-700 mb-5">Step 4: Upload Documents</h3>
            <p class="text-sm text-gray-600 mb-5">Upload only valid files (JPG, PNG, PDF under 2MB)</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block mb-1 font-medium text-gray-700">Business PAN Card *</label>
                    <input type="file" name="doc_business_pan" accept=".jpg,.png,.pdf" class="w-full border-2 border-purple-300 p-3 rounded-lg shadow-sm" required>
                </div>
                <div>
                    <label class="block mb-1 font-medium text-gray-700">Owner PAN Card *</label>
                    <input type="file" name="doc_owner_pan" accept=".jpg,.png,.pdf" class="w-full border-2 border-purple-300 p-3 rounded-lg shadow-sm" required>
                </div>
                <div>
                    <label class="block mb-1 font-medium text-gray-700">GST Certificate</label>
                    <input type="file" name="doc_gst" accept=".jpg,.png,.pdf" class="w-full border-2 border-purple-300 p-3 rounded-lg shadow-sm">
                </div>
                <div>
                    <label class="block mb-1 font-medium text-gray-700">Cancelled Cheque / Passbook *</label>
                    <input type="file" name="doc_cheque" accept=".jpg,.png,.pdf" class="w-full border-2 border-purple-300 p-3 rounded-lg shadow-sm" required>
                </div>
                <div>
                    <label class="block mb-1 font-medium text-gray-700">Address Proof *</label>
                    <input type="file" name="doc_address_proof" accept=".jpg,.png,.pdf" class="w-full border-2 border-purple-300 p-3 rounded-lg shadow-sm" required>
                </div>
            </div>
        </div>

        {{-- Navigation Buttons --}}
        <div class="flex justify-between mt-10 border-t pt-6">
            <button type="button" id="prevBtn" class="bg-purple-100 text-purple-800 px-6 py-2 rounded-lg font-medium hover:bg-purple-200 hidden">← Back</button>
            <button type="button" id="nextBtn" class="bg-gradient-to-r from-purple-600 via-blue-600 to-indigo-600 text-white px-6 py-2 rounded-lg font-medium shadow hover:opacity-90">Next →</button>
            <button type="submit" id="submitBtn" class="hidden bg-gradient-to-r from-purple-600 via-blue-600 to-indigo-600 text-white px-8 py-3 rounded-lg font-semibold shadow hover:opacity-90">Submit KYC</button>
        </div>
    </form>
</div>

{{-- JS for Step Navigation & Validation --}}
<script>
    let currentStep = 1;
    const totalSteps = 4;

    const showStep = (step) => {
        document.querySelectorAll('.step').forEach((s, index) => {
            s.classList.toggle('hidden', index + 1 !== step);
        });

        for (let i = 1; i <= totalSteps; i++) {
            const el = document.getElementById(`step${i}Indicator`);
            if (i < step) {
                el.className = "z-10 w-12 h-12 rounded-full flex items-center justify-center bg-gradient-to-r from-purple-600 via-blue-600 to-indigo-600 text-white font-bold shadow-lg";
            } else if (i === step) {
                el.className = "z-10 w-12 h-12 rounded-full flex items-center justify-center bg-gradient-to-r from-purple-600 via-blue-600 to-indigo-600 text-white font-bold shadow-xl scale-110";
            } else {
                el.className = "z-10 w-12 h-12 rounded-full flex items-center justify-center bg-gray-300 text-gray-600 font-bold shadow-md";
            }
        }

        document.getElementById('prevBtn').classList.toggle('hidden', step === 1);
        document.getElementById('nextBtn').classList.toggle('hidden', step === totalSteps);
        document.getElementById('submitBtn').classList.toggle('hidden', step !== totalSteps);
    };

    const validateStep = (step) => {
        let valid = true;
        const inputs = document.querySelectorAll(`#step${step} input[required], #step${step} select[required], #step${step} textarea[required]`);
        inputs.forEach(input => {
            if (!input.value.trim()) {
                input.classList.add('border-red-500');
                valid = false;
            } else {
                input.classList.remove('border-red-500');
            }
        });
        if (!valid) alert('Please fill all required fields before proceeding.');
        return valid;
    };

    document.getElementById('nextBtn').addEventListener('click', () => {
        if (validateStep(currentStep)) {
            currentStep++;
            showStep(currentStep);
        }
    });

    document.getElementById('prevBtn').addEventListener('click', () => {
        currentStep--;
        showStep(currentStep);
    });

    showStep(currentStep);
</script>
@endsection
