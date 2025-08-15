import React from 'react';
import { Link } from '@inertiajs/react';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { Badge } from '@/components/ui/badge';
import {
  GraduationCap,
  Users,
  BookOpen,
  Calendar,
  ClipboardList,
  BarChart3,
  MessageSquare,
  Bell,
  Shield,
  Smartphone,
  Globe,
  Award
} from 'lucide-react';

export default function Welcome() {
  const features = [
    {
      icon: Users,
      title: 'Multi-Role Management',
      description: 'Admin, Guru, Siswa, dan Orang Tua dengan akses sesuai peran',
      category: 'User Management'
    },
    {
      icon: BookOpen,
      title: 'Manajemen Akademik',
      description: 'Jadwal pelajaran, kurikulum, nilai, dan tugas online',
      category: 'Academic'
    },
    {
      icon: ClipboardList,
      title: 'Administrasi Sekolah',
      description: 'Pendaftaran online, absensi, dan manajemen data siswa',
      category: 'Administration'
    },
    {
      icon: BarChart3,
      title: 'Laporan & Analitik',
      description: 'Dashboard analitik dan ekspor data ke PDF/Excel',
      category: 'Analytics'
    },
    {
      icon: Bell,
      title: 'Sistem Notifikasi',
      description: 'Pengumuman real-time dan komunikasi sekolah',
      category: 'Communication'
    },
    {
      icon: MessageSquare,
      title: 'Forum & Chat',
      description: 'Forum diskusi dan live chat untuk komunikasi',
      category: 'Interactive'
    },
    {
      icon: Calendar,
      title: 'Kalender Akademik',
      description: 'Jadwal ujian, libur, dan kegiatan sekolah',
      category: 'Academic'
    },
    {
      icon: Award,
      title: 'Prestasi Siswa',
      description: 'Pencatatan dan pengelolaan prestasi siswa',
      category: 'Achievement'
    }
  ];

  const userRoles = [
    {
      role: 'Admin',
      icon: Shield,
      description: 'Akses penuh ke semua fitur sistem',
      features: ['CRUD semua data', 'Manajemen pengguna', 'Laporan sistem', 'Pengaturan sekolah']
    },
    {
      role: 'Guru',
      icon: GraduationCap,
      description: 'Mengelola kelas dan proses pembelajaran',
      features: ['Buat tugas & ujian', 'Input nilai siswa', 'Kelola jadwal mengajar', 'Komunikasi dengan siswa']
    },
    {
      role: 'Siswa',
      icon: BookOpen,
      description: 'Mengakses materi dan tugas pembelajaran',
      features: ['Lihat tugas & nilai', 'Download materi', 'Forum diskusi', 'Jadwal pelajaran']
    },
    {
      role: 'Orang Tua',
      icon: Users,
      description: 'Memantau perkembangan akademik anak',
      features: ['Monitor nilai anak', 'Komunikasi dengan guru', 'Laporan kehadiran', 'Pengumuman sekolah']
    }
  ];

  return (
    <div className="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100">
      {/* Header */}
      <header className="bg-white shadow-lg border-b">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex justify-between items-center h-16">
            <div className="flex items-center space-x-3">
              <div className="bg-blue-600 p-2 rounded-lg">
                <GraduationCap className="h-8 w-8 text-white" />
              </div>
              <div>
                <h1 className="text-2xl font-bold text-gray-900">SIS</h1>
                <p className="text-sm text-gray-600">School Information System</p>
              </div>
            </div>
            <div className="flex items-center space-x-4">
              <Button variant="outline" asChild>
                <Link href="/login">Masuk</Link>
              </Button>
              <Button asChild>
                <Link href="/register">Daftar</Link>
              </Button>
            </div>
          </div>
        </div>
      </header>

      {/* Hero Section */}
      <section className="py-20">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
          <div className="mb-8">
            <Badge variant="secondary" className="mb-4">
              🚀 Sistem Terbaru
            </Badge>
            <h2 className="text-5xl font-bold text-gray-900 mb-6">
              🏫 Sistem Informasi Sekolah
              <span className="block text-blue-600">Modern & Terintegrasi</span>
            </h2>
            <p className="text-xl text-gray-600 mb-8 max-w-3xl mx-auto">
              Platform digital lengkap untuk mengelola seluruh aspek pendidikan dengan 
              teknologi modern, UI/UX intuitif, dan fitur-fitur canggih untuk semua stakeholder sekolah.
            </p>
          </div>
          
          <div className="flex flex-col sm:flex-row gap-4 justify-center mb-12">
            <Button size="lg" className="text-lg px-8 py-3" asChild>
              <Link href="/dashboard">
                🎯 Mulai Sekarang
              </Link>
            </Button>
            <Button size="lg" variant="outline" className="text-lg px-8 py-3">
              📖 Lihat Demo
            </Button>
          </div>

          {/* Quick Stats */}
          <div className="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto">
            <div className="bg-white p-6 rounded-xl shadow-sm">
              <div className="text-3xl font-bold text-blue-600">4</div>
              <div className="text-sm text-gray-600">Role Pengguna</div>
            </div>
            <div className="bg-white p-6 rounded-xl shadow-sm">
              <div className="text-3xl font-bold text-green-600">20+</div>
              <div className="text-sm text-gray-600">Fitur Utama</div>
            </div>
            <div className="bg-white p-6 rounded-xl shadow-sm">
              <div className="text-3xl font-bold text-purple-600">6</div>
              <div className="text-sm text-gray-600">Modul Sistem</div>
            </div>
            <div className="bg-white p-6 rounded-xl shadow-sm">
              <div className="text-3xl font-bold text-orange-600">100%</div>
              <div className="text-sm text-gray-600">Web Based</div>
            </div>
          </div>
        </div>
      </section>

      {/* User Roles Section */}
      <section className="py-16 bg-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center mb-12">
            <h3 className="text-3xl font-bold text-gray-900 mb-4">
              👥 Multi-User System
            </h3>
            <p className="text-lg text-gray-600">
              Sistem yang dirancang khusus untuk setiap peran dalam ekosistem sekolah
            </p>
          </div>
          
          <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            {userRoles.map((user, index) => (
              <Card key={index} className="relative overflow-hidden group hover:shadow-lg transition-shadow">
                <CardHeader className="pb-3">
                  <div className="flex items-center space-x-3 mb-3">
                    <div className="bg-blue-100 p-2 rounded-lg">
                      <user.icon className="h-6 w-6 text-blue-600" />
                    </div>
                    <CardTitle className="text-lg">{user.role}</CardTitle>
                  </div>
                  <CardDescription className="text-sm">
                    {user.description}
                  </CardDescription>
                </CardHeader>
                <CardContent>
                  <ul className="space-y-2">
                    {user.features.map((feature, idx) => (
                      <li key={idx} className="text-sm text-gray-600 flex items-center">
                        <div className="w-1.5 h-1.5 bg-blue-600 rounded-full mr-2"></div>
                        {feature}
                      </li>
                    ))}
                  </ul>
                </CardContent>
              </Card>
            ))}
          </div>
        </div>
      </section>

      {/* Features Section */}
      <section className="py-16 bg-gray-50">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center mb-12">
            <h3 className="text-3xl font-bold text-gray-900 mb-4">
              ✨ Fitur-Fitur Unggulan
            </h3>
            <p className="text-lg text-gray-600">
              Solusi lengkap untuk digitalisasi sistem pendidikan modern
            </p>
          </div>
          
          <div className="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            {features.map((feature, index) => (
              <Card key={index} className="group hover:shadow-lg transition-all hover:-translate-y-1">
                <CardHeader className="pb-3">
                  <div className="flex items-center space-x-3 mb-3">
                    <div className="bg-gradient-to-r from-blue-500 to-indigo-600 p-2 rounded-lg">
                      <feature.icon className="h-5 w-5 text-white" />
                    </div>
                    <Badge variant="outline" className="text-xs">
                      {feature.category}
                    </Badge>
                  </div>
                  <CardTitle className="text-base">{feature.title}</CardTitle>
                </CardHeader>
                <CardContent>
                  <CardDescription className="text-sm">
                    {feature.description}
                  </CardDescription>
                </CardContent>
              </Card>
            ))}
          </div>
        </div>
      </section>

      {/* Technology Section */}
      <section className="py-16 bg-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center mb-12">
            <h3 className="text-3xl font-bold text-gray-900 mb-4">
              🛠️ Teknologi Modern
            </h3>
            <p className="text-lg text-gray-600">
              Dibangun dengan teknologi terdepan untuk performa optimal
            </p>
          </div>
          
          <div className="grid md:grid-cols-3 gap-8">
            <div className="text-center">
              <div className="bg-red-100 p-4 rounded-full w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                <Globe className="h-8 w-8 text-red-600" />
              </div>
              <h4 className="text-xl font-semibold mb-2">Laravel + React</h4>
              <p className="text-gray-600">Framework modern dengan arsitektur yang scalable dan maintainable</p>
            </div>
            <div className="text-center">
              <div className="bg-green-100 p-4 rounded-full w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                <Smartphone className="h-8 w-8 text-green-600" />
              </div>
              <h4 className="text-xl font-semibold mb-2">Responsive Design</h4>
              <p className="text-gray-600">Antarmuka yang optimal di semua perangkat: desktop, tablet, mobile</p>
            </div>
            <div className="text-center">
              <div className="bg-purple-100 p-4 rounded-full w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                <Shield className="h-8 w-8 text-purple-600" />
              </div>
              <h4 className="text-xl font-semibold mb-2">Keamanan Tinggi</h4>
              <p className="text-gray-600">Sistem keamanan berlapis dengan enkripsi data dan role-based access</p>
            </div>
          </div>
        </div>
      </section>

      {/* CTA Section */}
      <section className="py-16 bg-gradient-to-r from-blue-600 to-indigo-600">
        <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
          <h3 className="text-3xl font-bold text-white mb-4">
            🚀 Siap Mengdigitalkan Sekolah Anda?
          </h3>
          <p className="text-xl text-blue-100 mb-8">
            Bergabunglah dengan revolusi pendidikan digital dan tingkatkan efisiensi 
            pengelolaan sekolah dengan sistem informasi terintegrasi.
          </p>
          <div className="flex flex-col sm:flex-row gap-4 justify-center">
            <Button size="lg" variant="secondary" className="text-lg px-8 py-3" asChild>
              <Link href="/register">
                📝 Daftar Sekarang
              </Link>
            </Button>
            <Button size="lg" variant="outline" className="text-lg px-8 py-3 border-white text-white hover:bg-white hover:text-blue-600" asChild>
              <Link href="/login">
                🔑 Masuk ke Sistem
              </Link>
            </Button>
          </div>
        </div>
      </section>

      {/* Footer */}
      <footer className="bg-gray-900 text-white py-12">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid md:grid-cols-4 gap-8">
            <div>
              <div className="flex items-center space-x-2 mb-4">
                <GraduationCap className="h-8 w-8" />
                <h4 className="text-xl font-bold">SIS</h4>
              </div>
              <p className="text-gray-400 mb-4">
                Sistem Informasi Sekolah modern untuk digitalisasi pendidikan Indonesia.
              </p>
            </div>
            <div>
              <h5 className="font-semibold mb-4">Fitur Utama</h5>
              <ul className="space-y-2 text-gray-400">
                <li>Manajemen Siswa</li>
                <li>Sistem Akademik</li>
                <li>Portal Pembelajaran</li>
                <li>Komunikasi Terintegrasi</li>
              </ul>
            </div>
            <div>
              <h5 className="font-semibold mb-4">Pengguna</h5>
              <ul className="space-y-2 text-gray-400">
                <li>Administrator</li>
                <li>Guru & Staff</li>
                <li>Siswa</li>
                <li>Orang Tua</li>
              </ul>
            </div>
            <div>
              <h5 className="font-semibold mb-4">Dukungan</h5>
              <ul className="space-y-2 text-gray-400">
                <li>Dokumentasi</li>
                <li>Tutorial Video</li>
                <li>Support 24/7</li>
                <li>Training Team</li>
              </ul>
            </div>
          </div>
          <div className="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
            <p>&copy; 2024 School Information System. Built with ❤️ for Indonesian Education.</p>
          </div>
        </div>
      </footer>
    </div>
  );
}