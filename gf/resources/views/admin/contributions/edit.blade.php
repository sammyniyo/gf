@extends('admin.layout')

@section('page-title', 'Edit Contribution')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-semibold text-slate-900">Edit Contribution</h1>
            <p class="mt-1 text-sm text-slate-500">Update contribution details</p>
        </div>
        <a href="{{ route('admin.contributions.index') }}"
           class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-600 transition hover:border-slate-300 hover:text-slate-700">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Contributions
        </a>
    </div>

    <!-- Form -->
    <div class="glass-card p-6">
        <form action="{{ route('admin.contributions.update', $contribution) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Basic Information -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-slate-900">Contribution Details</h3>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div x-data="memberSearch()">
                        <label for="member_id" class="block text-sm font-medium text-slate-700 mb-2">Member *</label>

                        <!-- Search Input -->
                        <div class="relative">
                            <input type="text"
                                   x-model="searchTerm"
                                   @input="filterMembers()"
                                   @focus="showDropdown = true"
                                   @blur="setTimeout(() => showDropdown = false, 200)"
                                   placeholder="Search members..."
                                   class="w-full px-3 py-2 text-sm border rounded-lg focus:ring-1 focus:ring-emerald-400 focus:border-emerald-400 @error('member_id') border-red-300 @else border-slate-200 @enderror">

                            <!-- Search Icon -->
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>

                            <!-- Dropdown -->
                            <div x-show="showDropdown"
                                 x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="transform opacity-0 scale-95"
                                 x-transition:enter-end="transform opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="transform opacity-100 scale-100"
                                 x-transition:leave-end="transform opacity-0 scale-95"
                                 class="absolute z-10 w-full mt-1 bg-white border border-slate-200 rounded-lg shadow-lg max-h-60 overflow-auto"
                                 style="display: none;">

                                <!-- No Results -->
                                <div x-show="filteredMembers.length === 0"
                                     class="px-3 py-2 text-sm text-slate-500">
                                    No members found
                                </div>

                                <!-- Member Options -->
                                <template x-for="member in filteredMembers" :key="member.id">
                                    <div @click="selectMember(member)"
                                         class="px-3 py-2 text-sm cursor-pointer hover:bg-slate-50 border-b border-slate-100 last:border-b-0">
                                        <div class="font-medium text-slate-900" x-text="member.name"></div>
                                        <div class="text-slate-500 text-xs" x-text="member.email"></div>
                                        <div x-show="member.monthly_target > 0"
                                             class="text-emerald-600 text-xs mt-1"
                                             x-text="'Target: ' + formatCurrency(member.monthly_target) + ' RWF/month'">
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <!-- Selected Member Display -->
                        <div x-show="selectedMember" class="mt-2 p-3 bg-emerald-50 border border-emerald-200 rounded-lg">
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="font-medium text-emerald-900" x-text="selectedMember?.name"></div>
                                    <div class="text-emerald-700 text-sm" x-text="selectedMember?.email"></div>
                                    <div x-show="selectedMember?.monthly_target > 0"
                                         class="text-emerald-600 text-xs mt-1"
                                         x-text="'Target: ' + formatCurrency(selectedMember?.monthly_target) + ' RWF/month'">
                                    </div>
                                </div>
                                <button type="button"
                                        @click="clearSelection()"
                                        class="text-emerald-600 hover:text-emerald-800">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Hidden Input for Form Submission -->
                        <input type="hidden" name="member_id" :value="selectedMember?.id || ''" required>

                        @error('member_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="target_id" class="block text-sm font-medium text-slate-700 mb-2">Target (Optional)</label>
                        <select name="target_id" id="target_id"
                                class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-emerald-400 focus:border-emerald-400 @error('target_id') border-red-300 @enderror">
                            <option value="">No specific target</option>
                            @foreach($targets as $target)
                                <option value="{{ $target->id }}" {{ old('target_id', $contribution->target_id) == $target->id ? 'selected' : '' }}>
                                    {{ $target->name }} ({{ ucfirst($target->type) }})
                                </option>
                            @endforeach
                        </select>
                        @error('target_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label for="month" class="block text-sm font-medium text-slate-700 mb-2">Month *</label>
                        <input type="month" name="month" id="month" value="{{ old('month', $contribution->month) }}" required
                               class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-emerald-400 focus:border-emerald-400 @error('month') border-red-300 @enderror">
                        <p class="mt-1 text-xs text-slate-500">Each member can only have one contribution per month</p>
                        @error('month')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="amount" class="block text-sm font-medium text-slate-700 mb-2">Amount (RWF) *</label>
                        <input type="number" name="amount" id="amount" value="{{ old('amount', $contribution->amount) }}" min="0" step="0.01" required
                               class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-emerald-400 focus:border-emerald-400 @error('amount') border-red-300 @enderror">
                        @error('amount')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label for="payment_type" class="block text-sm font-medium text-slate-700 mb-2">Payment Type *</label>
                        <select name="payment_type" id="payment_type" required
                                class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-emerald-400 focus:border-emerald-400 @error('payment_type') border-red-300 @enderror">
                            <option value="monthly" {{ old('payment_type', $contribution->payment_type) === 'monthly' ? 'selected' : '' }}>Monthly</option>
                            <option value="one_time" {{ old('payment_type', $contribution->payment_type) === 'one_time' ? 'selected' : '' }}>One-time</option>
                        </select>
                        @error('payment_type')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="payment_method" class="block text-sm font-medium text-slate-700 mb-2">Payment Method</label>
                        <select name="payment_method" id="payment_method"
                                class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-emerald-400 focus:border-emerald-400 @error('payment_method') border-red-300 @enderror">
                            <option value="">Select method</option>
                            <option value="cash" {{ old('payment_method', $contribution->payment_method) === 'cash' ? 'selected' : '' }}>Cash</option>
                            <option value="mobile_money" {{ old('payment_method', $contribution->payment_method) === 'mobile_money' ? 'selected' : '' }}>Mobile Money</option>
                            <option value="bank_transfer" {{ old('payment_method', $contribution->payment_method) === 'bank_transfer' ? 'selected' : '' }}>Bank Transfer</option>
                            <option value="other" {{ old('payment_method', $contribution->payment_method) === 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('payment_method')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label for="payment_date" class="block text-sm font-medium text-slate-700 mb-2">Payment Date</label>
                        <input type="date" name="payment_date" id="payment_date" value="{{ old('payment_date', $contribution->payment_date?->format('Y-m-d')) }}"
                               class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-emerald-400 focus:border-emerald-400 @error('payment_date') border-red-300 @enderror">
                        @error('payment_date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-end pb-2">
                        <div class="space-y-2">
                            <label class="flex items-center">
                                <input type="checkbox" name="has_paid" value="1" {{ old('has_paid', $contribution->has_paid) ? 'checked' : '' }}
                                       class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                                <span class="ml-2 text-sm font-medium text-slate-700">Mark as Paid</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="is_recurring" value="1" {{ old('is_recurring', $contribution->is_recurring) ? 'checked' : '' }}
                                       class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                                <span class="ml-2 text-sm font-medium text-slate-700">Recurring Payment</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="notes" class="block text-sm font-medium text-slate-700 mb-2">Notes</label>
                    <textarea name="notes" id="notes" rows="3" placeholder="Any additional notes..."
                              class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-emerald-400 focus:border-emerald-400 @error('notes') border-red-300 @enderror">{{ old('notes', $contribution->notes) }}</textarea>
                    @error('notes')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-200">
                <a href="{{ route('admin.contributions.index') }}"
                   class="px-4 py-2 text-sm font-medium text-slate-700 bg-white border border-slate-300 rounded-lg hover:bg-slate-50">
                    Cancel
                </a>
                <button type="submit"
                        class="inline-flex items-center gap-2 rounded-xl bg-emerald-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg shadow-emerald-600/20 transition hover:bg-emerald-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Update Contribution
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function memberSearch() {
    return {
        searchTerm: '',
        showDropdown: false,
        selectedMember: null,
        allMembers: @json($membersForJs),
        filteredMembers: [],

        init() {
            // Initialize with all members
            this.filteredMembers = [...this.allMembers];

            // Set selected member if editing existing contribution
            @if(isset($contribution) && $contribution->member)
                const currentMember = {
                    id: {{ $contribution->member->id }},
                    name: '{{ $contribution->member->first_name }} {{ $contribution->member->last_name }}',
                    email: '{{ $contribution->member->email }}',
                    monthly_target: {{ $contribution->member->monthly_target ?? 0 }}
                };
                this.selectedMember = currentMember;
                this.searchTerm = currentMember.name;
            @elseif(old('member_id'))
                const oldMemberId = {{ old('member_id') }};
                const oldMember = this.allMembers.find(m => m.id === oldMemberId);
                if (oldMember) {
                    this.selectedMember = oldMember;
                    this.searchTerm = oldMember.name;
                }
            @endif
        },

        filterMembers() {
            if (!this.searchTerm.trim()) {
                this.filteredMembers = [...this.allMembers];
                return;
            }

            const term = this.searchTerm.toLowerCase();
            this.filteredMembers = this.allMembers.filter(member =>
                member.name.toLowerCase().includes(term) ||
                member.email.toLowerCase().includes(term)
            );
        },

        selectMember(member) {
            this.selectedMember = member;
            this.searchTerm = member.name;
            this.showDropdown = false;
        },

        clearSelection() {
            this.selectedMember = null;
            this.searchTerm = '';
            this.filteredMembers = [...this.allMembers];
        },

        formatCurrency(amount) {
            return new Intl.NumberFormat('en-RW').format(amount);
        }
    }
}
</script>
@endsection
