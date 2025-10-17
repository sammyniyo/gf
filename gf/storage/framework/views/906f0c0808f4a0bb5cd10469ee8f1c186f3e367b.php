<?php $__env->startSection('title', 'Contributions Calendar'); ?>

<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-blue-50 py-8 px-4">
    <div class="max-w-full mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h1 class="text-4xl font-black bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent">
                        Contributions Calendar <?php echo e($year); ?>

                    </h1>
                    <p class="text-gray-600 mt-2">Visual tracking of monthly contributions</p>
                </div>
                <div class="flex items-center gap-4">
                    <!-- Year Selector -->
                    <select onchange="window.location.href='?view=calendar&year='+this.value" class="px-4 py-2 border-2 border-emerald-200 rounded-xl focus:ring-2 focus:ring-emerald-500 font-semibold">
                        <?php for($y = now()->year - 2; $y <= now()->year + 1; $y++): ?>
                            <option value="<?php echo e($y); ?>" <?php echo e($y == $year ? 'selected' : ''); ?>><?php echo e($y); ?></option>
                        <?php endfor; ?>
                    </select>

                    <!-- View Toggle -->
                    <a href="<?php echo e(route('admin.contributions.index')); ?>" class="px-6 py-2 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold rounded-xl hover:shadow-lg transition-all">
                        <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                        </svg>
                        List View
                    </a>
                </div>
            </div>

            <!-- Legend -->
            <div class="flex flex-wrap gap-4 p-4 bg-white rounded-xl shadow-md border border-gray-200">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-emerald-400 to-green-500 flex items-center justify-center text-white font-bold">✓</div>
                    <span class="text-sm font-medium text-gray-700">Paid</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg bg-gray-100 border-2 border-gray-300"></div>
                    <span class="text-sm font-medium text-gray-700">Not Paid</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-2xl">🥇</span>
                    <span class="text-sm font-medium text-gray-700">12+ months</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-2xl">🏆</span>
                    <span class="text-sm font-medium text-gray-700">6-11 months</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-2xl">🌟</span>
                    <span class="text-sm font-medium text-gray-700">3-5 months</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-bold">STUDENT</div>
                    <span class="text-sm font-medium text-gray-700">500 RWF</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="px-3 py-1 rounded-full bg-purple-100 text-purple-700 text-xs font-bold">ALUMNI</div>
                    <span class="text-sm font-medium text-gray-700">1000 RWF</span>
                </div>
            </div>
        </div>

        <!-- Calendar Table -->
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-200">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gradient-to-r from-emerald-600 to-teal-600 text-white">
                            <th class="px-4 py-4 text-left font-bold sticky left-0 bg-emerald-600 z-10">
                                Member
                            </th>
                            <?php $__currentLoopData = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $monthName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <th class="px-3 py-4 text-center font-bold min-w-[60px]">
                                    <?php echo e($monthName); ?>

                                </th>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <th class="px-4 py-4 text-center font-bold min-w-[100px]">
                                Progress
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $calendarData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $memberData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="border-b border-gray-200 hover:bg-gradient-to-r hover:from-emerald-50 hover:to-teal-50 transition-all <?php echo e($index % 2 == 0 ? 'bg-white' : 'bg-gray-50'); ?>">
                                <!-- Member Name Column (Sticky) -->
                                <td class="px-4 py-3 sticky left-0 <?php echo e($index % 2 == 0 ? 'bg-white' : 'bg-gray-50'); ?> z-10 border-r border-gray-200">
                                    <div class="flex items-center gap-2">
                                        <div class="flex-1">
                                            <p class="font-bold text-gray-900 text-sm flex items-center gap-2">
                                                <?php echo e($memberData['name']); ?>

                                                <?php if($memberData['has_award']): ?>
                                                    <span class="text-xl"><?php echo e($memberData['award_emoji']); ?></span>
                                                <?php endif; ?>
                                            </p>
                                            <div class="flex items-center gap-2 mt-1">
                                                <span class="px-2 py-0.5 rounded-full text-xs font-bold
                                                    <?php echo e($memberData['category'] === 'student' ? 'bg-blue-100 text-blue-700' : 'bg-purple-100 text-purple-700'); ?>">
                                                    <?php echo e(strtoupper($memberData['category'])); ?>

                                                </span>
                                                <span class="text-xs text-gray-500 font-medium"><?php echo e(number_format($memberData['target'])); ?> RWF/mo</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Month Columns -->
                                <?php $__currentLoopData = range(1, 12); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $month): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td class="px-2 py-3 text-center">
                                        <?php if($memberData['months'][$month]['paid']): ?>
                                            <div class="relative group">
                                                <div class="w-10 h-10 mx-auto rounded-lg bg-gradient-to-br from-emerald-400 to-green-500 flex items-center justify-center text-white font-bold shadow-md hover:scale-110 transition-transform cursor-pointer">
                                                    ✓
                                                </div>
                                                <!-- Tooltip -->
                                                <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 px-3 py-2 bg-gray-900 text-white text-xs rounded-lg opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none whitespace-nowrap z-20">
                                                    Paid: <?php echo e(number_format($memberData['months'][$month]['amount'])); ?> RWF
                                                </div>
                                            </div>
                                        <?php else: ?>
                                            <div class="w-10 h-10 mx-auto rounded-lg bg-gray-100 border-2 border-gray-300 flex items-center justify-center hover:border-rose-400 transition-all"></div>
                                        <?php endif; ?>
                                    </td>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <!-- Progress Column -->
                                <td class="px-4 py-3 text-center">
                                    <div class="flex flex-col items-center gap-2">
                                        <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
                                            <div class="h-full rounded-full transition-all duration-500 <?php echo e($memberData['completion'] >= 100 ? 'bg-gradient-to-r from-green-500 to-emerald-600' : 'bg-gradient-to-r from-blue-500 to-indigo-600'); ?>"
                                                 style="width: <?php echo e($memberData['completion']); ?>%"></div>
                                        </div>
                                        <span class="text-sm font-bold <?php echo e($memberData['completion'] >= 100 ? 'text-green-600' : 'text-gray-700'); ?>">
                                            <?php echo e($memberData['completion']); ?>%
                                        </span>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php if(count($calendarData) === 0): ?>
            <div class="text-center py-20">
                <div class="inline-block p-6 bg-gradient-to-r from-gray-100 to-gray-200 rounded-full mb-6">
                    <svg class="w-20 h-20 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-700 mb-2">No Members Found</h3>
                <p class="text-gray-500">Add active members to see their contribution calendar</p>
            </div>
        <?php endif; ?>

        <!-- Summary Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-8">
            <?php
                $totalMembers = count($calendarData);
                $fullyPaidMembers = collect($calendarData)->filter(fn($m) => $m['completion'] >= 100)->count();
                $partiallyPaidMembers = collect($calendarData)->filter(fn($m) => $m['completion'] > 0 && $m['completion'] < 100)->count();
                $notPaidMembers = collect($calendarData)->filter(fn($m) => $m['completion'] == 0)->count();
            ?>

            <div class="p-6 bg-gradient-to-br from-green-50 to-emerald-100 rounded-2xl border-2 border-green-200 shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-green-600 font-semibold text-sm uppercase tracking-wide">Fully Paid</p>
                        <p class="text-4xl font-black text-green-700 mt-2"><?php echo e($fullyPaidMembers); ?></p>
                    </div>
                    <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center text-white text-3xl">
                        ✓
                    </div>
                </div>
            </div>

            <div class="p-6 bg-gradient-to-br from-blue-50 to-indigo-100 rounded-2xl border-2 border-blue-200 shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-blue-600 font-semibold text-sm uppercase tracking-wide">Partially Paid</p>
                        <p class="text-4xl font-black text-blue-700 mt-2"><?php echo e($partiallyPaidMembers); ?></p>
                    </div>
                    <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center text-white text-3xl">
                        ⏳
                    </div>
                </div>
            </div>

            <div class="p-6 bg-gradient-to-br from-rose-50 to-red-100 rounded-2xl border-2 border-rose-200 shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-rose-600 font-semibold text-sm uppercase tracking-wide">Not Paid</p>
                        <p class="text-4xl font-black text-rose-700 mt-2"><?php echo e($notPaidMembers); ?></p>
                    </div>
                    <div class="w-16 h-16 bg-rose-500 rounded-full flex items-center justify-center text-white text-3xl">
                        ✕
                    </div>
                </div>
            </div>

            <div class="p-6 bg-gradient-to-br from-purple-50 to-violet-100 rounded-2xl border-2 border-purple-200 shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-purple-600 font-semibold text-sm uppercase tracking-wide">Total Members</p>
                        <p class="text-4xl font-black text-purple-700 mt-2"><?php echo e($totalMembers); ?></p>
                    </div>
                    <div class="w-16 h-16 bg-purple-500 rounded-full flex items-center justify-center text-white text-3xl">
                        👥
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\samsh\Documents\gf\gf\resources\views/admin/contributions/calendar.blade.php ENDPATH**/ ?>