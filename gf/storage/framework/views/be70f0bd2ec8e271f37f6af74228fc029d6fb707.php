<?php $__env->startSection('title', 'Member Details - ' . $member->full_name); ?>

<?php $__env->startSection('content'); ?>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
            <div class="p-6">
                <div class="flex justify-between items-start">
                    <div class="flex items-center space-x-4">
                        <?php if($member->profile_photo): ?>
                            <img class="h-20 w-20 rounded-full object-cover" src="<?php echo e($member->profile_photo_url); ?>" alt="<?php echo e($member->full_name); ?>">
                        <?php else: ?>
                            <div class="h-20 w-20 rounded-full bg-green-100 flex items-center justify-center">
                                <i class="fas fa-user text-green-600 text-2xl"></i>
                            </div>
                        <?php endif; ?>
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900"><?php echo e($member->full_name); ?></h1>
                            <p class="text-lg text-gray-600"><?php echo e($member->occupation); ?></p>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium mt-2
                                <?php echo e($member->status === 'active' ? 'bg-green-100 text-green-800' : ''); ?>

                                <?php echo e($member->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : ''); ?>

                                <?php echo e($member->status === 'inactive' ? 'bg-red-100 text-red-800' : ''); ?>">
                                <?php echo e(ucfirst($member->status)); ?>

                            </span>
                        </div>
                    </div>
                    <div class="flex space-x-3">
                        <a href="<?php echo e(route('admin.members.edit', $member)); ?>"
                            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                            <i class="fas fa-edit mr-2"></i>Edit
                        </a>
                        <a href="<?php echo e(route('admin.members.index')); ?>"
                            class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors duration-200">
                            <i class="fas fa-arrow-left mr-2"></i>Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Information -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Personal Information -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h2 class="text-xl font-bold text-gray-900 mb-4">
                            <i class="fas fa-user mr-2 text-green-600"></i>Personal Information
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Email</label>
                                <p class="mt-1 text-sm text-gray-900"><?php echo e($member->email); ?></p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Phone</label>
                                <p class="mt-1 text-sm text-gray-900"><?php echo e($member->phone); ?></p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Date of Birth</label>
                                <p class="mt-1 text-sm text-gray-900"><?php echo e($member->date_of_birth?->format('F j, Y')); ?></p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Gender</label>
                                <p class="mt-1 text-sm text-gray-900"><?php echo e(ucfirst($member->gender)); ?></p>
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-500">Address</label>
                                <p class="mt-1 text-sm text-gray-900"><?php echo e($member->address); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Professional Information -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h2 class="text-xl font-bold text-gray-900 mb-4">
                            <i class="fas fa-briefcase mr-2 text-green-600"></i>Professional Information
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Occupation</label>
                                <p class="mt-1 text-sm text-gray-900"><?php echo e($member->occupation); ?></p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Workplace</label>
                                <p class="mt-1 text-sm text-gray-900"><?php echo e($member->workplace ?? 'Not specified'); ?></p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Education Level</label>
                                <p class="mt-1 text-sm text-gray-900"><?php echo e(ucfirst($member->education_level ?? 'Not specified')); ?></p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Skills</label>
                                <p class="mt-1 text-sm text-gray-900"><?php echo e($member->skills ?? 'Not specified'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Choir Details -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h2 class="text-xl font-bold text-gray-900 mb-4">
                            <i class="fas fa-music mr-2 text-green-600"></i>Choir Details
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Voice Type</label>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium mt-1
                                    <?php echo e($member->voice_type === 'soprano' ? 'bg-pink-100 text-pink-800' : ''); ?>

                                    <?php echo e($member->voice_type === 'alto' ? 'bg-purple-100 text-purple-800' : ''); ?>

                                    <?php echo e($member->voice_type === 'tenor' ? 'bg-blue-100 text-blue-800' : ''); ?>

                                    <?php echo e($member->voice_type === 'bass' ? 'bg-indigo-100 text-indigo-800' : ''); ?>

                                    <?php echo e($member->voice_type === 'unsure' ? 'bg-gray-100 text-gray-800' : ''); ?>">
                                    <?php echo e(ucfirst($member->voice_type ?? 'Not specified')); ?>

                                </span>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Musical Experience</label>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium mt-1
                                    <?php echo e($member->musical_experience === 'beginner' ? 'bg-green-100 text-green-800' : ''); ?>

                                    <?php echo e($member->musical_experience === 'intermediate' ? 'bg-yellow-100 text-yellow-800' : ''); ?>

                                    <?php echo e($member->musical_experience === 'advanced' ? 'bg-orange-100 text-orange-800' : ''); ?>

                                    <?php echo e($member->musical_experience === 'professional' ? 'bg-red-100 text-red-800' : ''); ?>">
                                    <?php echo e(ucfirst($member->musical_experience ?? 'Not specified')); ?>

                                </span>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Instruments</label>
                                <p class="mt-1 text-sm text-gray-900"><?php echo e($member->instruments ?? 'None specified'); ?></p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Choir Experience</label>
                                <p class="mt-1 text-sm text-gray-900"><?php echo e(ucfirst($member->choir_experience ?? 'Not specified')); ?></p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Availability</label>
                                <p class="mt-1 text-sm text-gray-900"><?php echo e(ucfirst($member->availability ?? 'Not specified')); ?></p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Newsletter</label>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium mt-1
                                    <?php echo e($member->newsletter ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800'); ?>">
                                    <?php echo e($member->newsletter ? 'Subscribed' : 'Not Subscribed'); ?>

                                </span>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Why Join Choir</label>
                            <p class="mt-1 text-sm text-gray-900 bg-gray-50 p-3 rounded-lg"><?php echo e($member->why_join); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Emergency Contact -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h2 class="text-xl font-bold text-gray-900 mb-4">
                            <i class="fas fa-phone mr-2 text-green-600"></i>Emergency Contact
                        </h2>
                        <div class="space-y-3">
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Name</label>
                                <p class="mt-1 text-sm text-gray-900"><?php echo e($member->emergency_contact_name); ?></p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Phone</label>
                                <p class="mt-1 text-sm text-gray-900"><?php echo e($member->emergency_contact_phone); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Application Details -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h2 class="text-xl font-bold text-gray-900 mb-4">
                            <i class="fas fa-info-circle mr-2 text-green-600"></i>Application Details
                        </h2>
                        <div class="space-y-3">
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Application Date</label>
                                <p class="mt-1 text-sm text-gray-900"><?php echo e($member->created_at->format('F j, Y \a\t g:i A')); ?></p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Member ID</label>
                                <p class="mt-1 text-sm text-gray-900">#<?php echo e(str_pad($member->id, 4, '0', STR_PAD_LEFT)); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h2 class="text-xl font-bold text-gray-900 mb-4">
                            <i class="fas fa-bolt mr-2 text-green-600"></i>Quick Actions
                        </h2>
                        <div class="space-y-3">
                            <a href="mailto:<?php echo e($member->email); ?>"
                                class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200 flex items-center justify-center">
                                <i class="fas fa-envelope mr-2"></i>Send Email
                            </a>
                            <a href="tel:<?php echo e($member->phone); ?>"
                                class="w-full bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors duration-200 flex items-center justify-center">
                                <i class="fas fa-phone mr-2"></i>Call Member
                            </a>
                            <button onclick="copyToClipboard('<?php echo e($member->email); ?>')"
                                class="w-full bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors duration-200 flex items-center justify-center">
                                <i class="fas fa-copy mr-2"></i>Copy Email
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        // Show success message
        const button = event.target.closest('button');
        const originalText = button.innerHTML;
        button.innerHTML = '<i class="fas fa-check mr-2"></i>Copied!';
        button.classList.remove('bg-gray-600', 'hover:bg-gray-700');
        button.classList.add('bg-green-600');

        setTimeout(() => {
            button.innerHTML = originalText;
            button.classList.remove('bg-green-600');
            button.classList.add('bg-gray-600', 'hover:bg-gray-700');
        }, 2000);
    }).catch(function(err) {
        console.error('Could not copy text: ', err);
        alert('Failed to copy to clipboard');
    });
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\samsh\Documents\gf\gf\resources\views/admin/members/show.blade.php ENDPATH**/ ?>