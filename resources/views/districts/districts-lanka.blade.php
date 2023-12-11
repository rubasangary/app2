<div>
    <div class="mb-6">
        <label data-te-select-label-ref>மாவட்டம்/District</label>
        <select class="w-full rounded-md border-gray-800 focus:border-indigo-800 dark:bg-gray-900" name="district" data-te-select-init>
            <option value="" selected>Select District</option>
            <option value="All Districts" {{ old('district') == 'All Districts' ? 'selected' : '' }}>All Districts</option>
            <option value="Ampara" {{ old('district') == 'Ampara' ? 'selected' : '' }}>Ampara</option>
            <option value="Anuradhapura" {{ old('district') == 'Anuradhapura' ? 'selected' : '' }}>Anuradhapura</option>
            <option value="Badulla" {{ old('district') == 'Badulla' ? 'selected' : '' }}>Badulla</option>
            <option value="Batticaloa" {{ old('district') == 'Batticaloa' ? 'selected' : '' }}>Batticaloa</option>
            <option value="Colombo" {{ old('district') == 'Colombo' ? 'selected' : '' }}>Colombo</option>
            <option value="Galle" {{ old('district') == 'Galle' ? 'selected' : '' }}>Galle</option>
            <option value="Gampaha" {{ old('district') == 'Gampaha' ? 'selected' : '' }}>Gampaha</option>
            <option value="Hambantota" {{ old('district') == 'Hambantota' ? 'selected' : '' }}>Hambantota</option>
            <option value="Jaffna" {{ old('district') == 'Jaffna' ? 'selected' : '' }}>Jaffna</option>
            <option value="Kalutara" {{ old('district') == 'Kalutara' ? 'selected' : '' }}>Kalutara</option>
            <option value="Kandy" {{ old('district') == 'Kandy' ? 'selected' : '' }}>Kandy</option>
            <option value="Kegalle" {{ old('district') == 'Kegalle' ? 'selected' : '' }}>Kegalle</option>
            <option value="Kilinochchi" {{ old('district') == 'Kilinochchi' ? 'selected' : '' }}>Kilinochchi</option>
            <option value="Kurunegala" {{ old('district') == 'Kurunegala' ? 'selected' : '' }}>Kurunegala</option>
            <option value="Mannar" {{ old('district') == 'Mannar' ? 'selected' : '' }}>Mannar</option>
            <option value="Matale" {{ old('district') == 'Matale' ? 'selected' : '' }}>Matale</option>
            <option value="Matara" {{ old('district') == 'Matara' ? 'selected' : '' }}>Matara</option>
            <option value="Monaragala" {{ old('district') == 'Monaragala' ? 'selected' : '' }}>Monaragala</option>
            <option value="Mullaitivu" {{ old('district') == 'Mullaitivu' ? 'selected' : '' }}>Mullaitivu</option>
            <option value="Nuwara Eliya" {{ old('district') == 'Nuwara Eliya' ? 'selected' : '' }}>Nuwara Eliya</option>
            <option value="Polonnaruwa" {{ old('district') == 'Polonnaruwa' ? 'selected' : '' }}>Polonnaruwa</option>
            <option value="Puttalam" {{ old('district') == 'Puttalam' ? 'selected' : '' }}>Puttalam</option>
            <option value="Ratnapura" {{ old('district') == 'Ratnapura' ? 'selected' : '' }}>Ratnapura</option>
            <option value="Trincomalee" {{ old('district') == 'Trincomalee' ? 'selected' : '' }}>Trincomalee</option>
            <option value="Vavuniya" {{ old('district') == 'Vavuniya' ? 'selected' : '' }}>Vavuniya</option>
        </select>
    </div>
</div>
