<?php $__env->startSection('title', 'Join God\'s Family Choir | Member Registration'); ?>

<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-gradient-to-br from-emerald-50 via-white to-amber-50 py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-12">
            <div class="inline-block px-4 py-2 bg-emerald-100 text-emerald-800 rounded-full text-sm font-semibold mb-4">
                🎵 CHOIR MEMBER REGISTRATION
            </div>
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">
                Join <span class="text-emerald-600">God's Family Choir</span>
            </h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                We're excited to have you join our musical ministry! Please fill out all sections carefully.
            </p>
        </div>

        <!-- Registration Form -->
        <form action="<?php echo e(route('registration.member.store')); ?>" method="POST" enctype="multipart/form-data" class="space-y-8">
            <?php echo csrf_field(); ?>

            <!-- Section 1: Personal Information -->
            <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-emerald-500 text-white rounded-full flex items-center justify-center font-bold">
                        1
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900">Personal Information</h2>
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            First Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="first_name" value="<?php echo e(old('first_name')); ?>" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                        <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Last Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="last_name" value="<?php echo e(old('last_name')); ?>" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                        <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Email Address <span class="text-red-500">*</span>
                        </label>
                        <input type="email" name="email" value="<?php echo e(old('email')); ?>" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Phone Number <span class="text-red-500">*</span>
                        </label>
                        <input type="tel" name="phone" value="<?php echo e(old('phone')); ?>" required
                            placeholder="+250 XXX XXX XXX"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                        <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Date of Birth <span class="text-red-500">*</span>
                        </label>
                        <input type="date" name="birthdate" value="<?php echo e(old('birthdate')); ?>" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                        <?php $__errorArgs = ['birthdate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Gender <span class="text-red-500">*</span>
                        </label>
                        <select name="gender" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                            <option value="">Select Gender</option>
                            <option value="male" <?php echo e(old('gender') == 'male' ? 'selected' : ''); ?>>Male</option>
                            <option value="female" <?php echo e(old('gender') == 'female' ? 'selected' : ''); ?>>Female</option>
                            <option value="other" <?php echo e(old('gender') == 'other' ? 'selected' : ''); ?>>Other</option>
                        </select>
                        <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Address <span class="text-red-500">*</span>
                        </label>
                        <textarea name="address" rows="2" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent"><?php echo e(old('address')); ?></textarea>
                        <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            </div>

            <!-- Section 2: Professional Information -->
            <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-amber-500 text-white rounded-full flex items-center justify-center font-bold">
                        2
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900">Professional & Church Information</h2>
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Occupation
                        </label>
                        <input type="text" name="occupation" value="<?php echo e(old('occupation')); ?>"
                            placeholder="e.g., Student, Teacher, Engineer"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                        <?php $__errorArgs = ['occupation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Workplace/Institution
                        </label>
                        <input type="text" name="workplace" value="<?php echo e(old('workplace')); ?>"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                        <?php $__errorArgs = ['workplace'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Church/Congregation
                        </label>
                        <input type="text" name="church" value="<?php echo e(old('church')); ?>"
                            placeholder="e.g., ASA UR Nyarugenge"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                        <?php $__errorArgs = ['church'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Education Level
                        </label>
                        <select name="education_level"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                            <option value="">Select Level</option>
                            <option value="primary" <?php echo e(old('education_level') == 'primary' ? 'selected' : ''); ?>>Primary</option>
                            <option value="secondary" <?php echo e(old('education_level') == 'secondary' ? 'selected' : ''); ?>>Secondary</option>
                            <option value="diploma" <?php echo e(old('education_level') == 'diploma' ? 'selected' : ''); ?>>Diploma</option>
                            <option value="bachelors" <?php echo e(old('education_level') == 'bachelors' ? 'selected' : ''); ?>>Bachelor's Degree</option>
                            <option value="masters" <?php echo e(old('education_level') == 'masters' ? 'selected' : ''); ?>>Master's Degree</option>
                            <option value="doctorate" <?php echo e(old('education_level') == 'doctorate' ? 'selected' : ''); ?>>Doctorate</option>
                            <option value="other" <?php echo e(old('education_level') == 'other' ? 'selected' : ''); ?>>Other</option>
                        </select>
                        <?php $__errorArgs = ['education_level'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            </div>

            <!-- Section 3: Choir Details -->
            <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-blue-500 text-white rounded-full flex items-center justify-center font-bold">
                        3
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900">Musical Background</h2>
                </div>

                <div class="space-y-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Voice Type <span class="text-red-500">*</span>
                            </label>
                            <select name="voice" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                                <option value="">Select Voice Type</option>
                                <option value="soprano" <?php echo e(old('voice') == 'soprano' ? 'selected' : ''); ?>>Soprano</option>
                                <option value="alto" <?php echo e(old('voice') == 'alto' ? 'selected' : ''); ?>>Alto</option>
                                <option value="tenor" <?php echo e(old('voice') == 'tenor' ? 'selected' : ''); ?>>Tenor</option>
                                <option value="bass" <?php echo e(old('voice') == 'bass' ? 'selected' : ''); ?>>Bass</option>
                                <option value="other" <?php echo e(old('voice') == 'other' ? 'selected' : ''); ?>>Not Sure/Other</option>
                            </select>
                            <?php $__errorArgs = ['voice'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Primary Talent
                            </label>
                            <select name="talent"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                                <option value="">Select Talent</option>
                                <option value="singer" <?php echo e(old('talent') == 'singer' ? 'selected' : ''); ?>>Singer</option>
                                <option value="instrumentalist" <?php echo e(old('talent') == 'instrumentalist' ? 'selected' : ''); ?>>Instrumentalist</option>
                                <option value="both" <?php echo e(old('talent') == 'both' ? 'selected' : ''); ?>>Both Singer & Instrumentalist</option>
                                <option value="choir_director" <?php echo e(old('talent') == 'choir_director' ? 'selected' : ''); ?>>Choir Director</option>
                                <option value="other" <?php echo e(old('talent') == 'other' ? 'selected' : ''); ?>>Other</option>
                            </select>
                            <?php $__errorArgs = ['talent'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Instruments You Play
                        </label>
                        <input type="text" name="instruments" value="<?php echo e(old('instruments')); ?>"
                            placeholder="e.g., Piano, Guitar, Drums (or leave blank)"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                        <?php $__errorArgs = ['instruments'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Musical Experience
                        </label>
                        <textarea name="musical_experience" rows="3"
                            placeholder="Describe your musical background, training, or experience..."
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent"><?php echo e(old('musical_experience')); ?></textarea>
                        <?php $__errorArgs = ['musical_experience'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Previous Choir Experience
                        </label>
                        <textarea name="choir_experience" rows="3"
                            placeholder="Tell us about any choirs you've been part of..."
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent"><?php echo e(old('choir_experience')); ?></textarea>
                        <?php $__errorArgs = ['choir_experience'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Why Do You Want to Join God's Family Choir?
                        </label>
                        <textarea name="why_join" rows="4"
                            placeholder="Share your motivation for joining our ministry..."
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent"><?php echo e(old('why_join')); ?></textarea>
                        <?php $__errorArgs = ['why_join'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            </div>

            <!-- Section 4: Additional Information -->
            <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-purple-500 text-white rounded-full flex items-center justify-center font-bold">
                        4
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900">Additional Information</h2>
                </div>

                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Hobbies & Interests
                        </label>
                        <input type="text" name="hobbies" value="<?php echo e(old('hobbies')); ?>"
                            placeholder="e.g., Reading, Sports, Photography"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                        <?php $__errorArgs = ['hobbies'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Other Skills
                        </label>
                        <input type="text" name="skills" value="<?php echo e(old('skills')); ?>"
                            placeholder="e.g., Photography, Video Editing, Graphic Design"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                        <?php $__errorArgs = ['skills'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Availability
                        </label>
                        <textarea name="availability" rows="3"
                            placeholder="When are you available for rehearsals? (e.g., Weekends, Evenings)"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent"><?php echo e(old('availability')); ?></textarea>
                        <?php $__errorArgs = ['availability'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Profile Photo (Optional)
                        </label>
                        <div class="flex items-start gap-4">
                            <!-- Photo Preview -->
                            <div id="photoPreview" class="hidden w-24 h-24 border-2 border-gray-300 rounded-lg overflow-hidden bg-gray-50">
                                <img id="previewImage" src="" alt="Preview" class="w-full h-full object-cover">
                            </div>

                            <!-- Upload Area -->
                            <div class="flex-1">
                                <input type="file" name="photo_path" id="photo_path" accept="image/*" onchange="previewPhoto(this)"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                                <p class="text-sm text-gray-500 mt-1">Maximum file size: 2MB (JPG, PNG, GIF)</p>
                                <?php $__errorArgs = ['photo_path'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Additional Message
                        </label>
                        <textarea name="message" rows="4"
                            placeholder="Anything else you'd like us to know?"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent"><?php echo e(old('message')); ?></textarea>
                        <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="flex items-start gap-3">
                        <input type="checkbox" name="newsletter" value="1" id="newsletter" <?php echo e(old('newsletter') ? 'checked' : ''); ?>

                            class="mt-1 w-5 h-5 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                        <label for="newsletter" class="text-sm text-gray-700">
                            I would like to receive newsletters and updates from God's Family Choir
                        </label>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                <div class="text-center">
                    <button type="submit"
                        class="inline-flex items-center gap-3 px-12 py-4 bg-gradient-to-r from-emerald-500 to-emerald-600 text-white font-bold text-lg rounded-xl hover:shadow-xl hover:shadow-emerald-500/50 transition-all duration-300 transform hover:-translate-y-1">
                        <i class="fas fa-check-circle"></i>
                        Submit Registration
                    </button>
                    <p class="text-sm text-gray-500 mt-4">
                        By submitting, you agree to our terms and conditions
                    </p>
                </div>
            </div>
        </form>

        <!-- Help Section -->
        <div class="mt-8 bg-blue-50 border border-blue-200 rounded-xl p-6">
            <div class="flex items-start gap-4">
                <i class="fas fa-info-circle text-blue-600 text-2xl"></i>
                <div>
                    <h3 class="font-bold text-blue-900 mb-2">Need Help?</h3>
                    <p class="text-blue-800 text-sm">
                        If you have any questions or need assistance filling out this form, please contact us at
                        <a href="mailto:info@godsfamilychoir.org" class="underline">info@godsfamilychoir.org</a> or
                        call <a href="tel:+250783871782" class="underline">+250 783 871 782</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Photo Preview Script -->
<script>
function previewPhoto(input) {
    const preview = document.getElementById('photoPreview');
    const previewImage = document.getElementById('previewImage');

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            previewImage.src = e.target.result;
            preview.classList.remove('hidden');
        }

        reader.readAsDataURL(input.files[0]);
    } else {
        preview.classList.add('hidden');
        previewImage.src = '';
    }
}
</script>

<!-- Footer -->
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.static.footer','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('static.footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\samsh\Documents\gf\gf\resources\views/registration/member.blade.php ENDPATH**/ ?>